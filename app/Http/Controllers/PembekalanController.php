<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Pic;
use App\Models\Bank;
use App\Models\Invoice;
use App\Models\Peserta;
use App\Models\Schedule;
use App\Models\Pembekalan;
use App\Models\BeritaAcara;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use App\Models\LevelPembekalan;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PembekalanController extends Controller
{
    public function rand_color()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    function numberToRoman($num)
    {
        // Be sure to convert the given parameter into an integer
        $n = intval($num);
        $result = '';

        // Declare a lookup array that we will use to traverse the number:
        $lookup = array(
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        );

        foreach ($lookup as $roman => $value)
        {
            // Look for number of matches
            $matches = intval($n / $value);

            // Concatenate characters
            $result .= str_repeat($roman, $matches);

            // Substract that from the number
            $n = $n % $value;
        }

        return $result;
    }

    public function index(Request $request)
    {
        $page_name = "Pembekalan";

        $no_akhir = Invoice::max('id');
        $no_urut = sprintf("%03s", abs($no_akhir+1));
        $kd_surat = "Fin-EKS/Tag";
        $bln = now()->month;
        $bulan = $this->numberToRoman($bln);

        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();

        $data_pembekalan = Pembekalan::with([
            'surat_penegasan' => function($query) {
                return $query->orderBy('tgl_surat', 'ASC');
            }, 'metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'peserta', 'schedule'])->get();

        // if($request->ajax()){
        //     $data = Pembekalan::with([
        //         'bank', 'metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'peserta', 'schedule'
        //         ]);
        //     return Datatables::of($data)->addIndexColumn()
        //         ->addColumn('bank', function (Pembekalan $pembekalan){
        //             return $pembekalan->bank->nama;
        //         })
        //         ->addColumn('materi_pembekalan', function (Pembekalan $pembekalan){
        //             return $pembekalan->materi_pembekalan->materi;
        //         })
        //         ->addColumn('pengajar', function (Pembekalan $pembekalan){
        //             return $pembekalan->pengajar->nama;
        //         })
        //         ->addColumn('pic', function (Pembekalan $pembekalan){
        //             if($pembekalan->pic->midle_name == null){
        //                 return $pembekalan->pic->first_name . ' ' .$pembekalan->pic->last_name;
        //             } elseif($pembekalan->pic->last_name == null){
        //                 return $pembekalan->pic->first_name . ' ' .$pembekalan->pic->midle_name;
        //             } elseif($pembekalan->pic->last_name && $pembekalan->pic->last_name == null){
        //                 return $pembekalan->pic->first_name;
        //             } else {
        //                 return $pembekalan->pic->first_name . ' ' .$pembekalan->pic->midle_name . ' ' . $pembekalan->pic->last_name;
        //             }
        //         })
        //         ->addColumn('tanggal_mulai', function($row){
        //             $tgl = $row['tanggal_mulai']->isoFormat('dddd, DD MMMM YYYY');
        //             return $tgl;
        //         })
        //         ->addColumn('action', function($row){
        //             $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        // $pembekalan = Pembekalan::all();
        $surat_penegasan = SuratPenegasan::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'level_pembekalan', 'pic']);
            }
            , 'bank', 'bpo'])->get();
        $events = [];
        $schedule = Schedule::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'metode_pembekalan','level_pembekalan', 'pic']);
            }])->get();

        foreach($schedule as $data) {
            if($data->pembekalan->is_done == '1')
            {
                $mulai = $data->tanggal;
                $selesai = $data->tanggal;
                $title = $data->pembekalan->materi_pembekalan->kode.' - '.$data->pembekalan->bank->nama;
                $events[] = [
                    'title' => $title,
                    'start' => $mulai,
                    'end' => $selesai,
                    'borderColor' => 'black',
                    'description' => $title,
                    'color' => 'red',
                    'display' => 'background',
                ];
            } else {
                $mulai = $data->tanggal;
                $selesai = $data->tanggal;
                $title = $data->pembekalan->materi_pembekalan->kode.' - '.$data->pembekalan->bank->nama;
                $events[] = [
                    'title' => $title,
                    'start' => $mulai,
                    'end' => $selesai,
                    'borderColor' => 'black',
                    'description' => $title,
                    'color' => 'blue',
                    'display' => 'background',
                ];
            }

            $peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                            ->where('peserta.pembekalan_uuid', $data->pembekalan->uuid)
                            ->get();
            $jml_peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                            ->where('peserta.pembekalan_uuid', $data->pembekalan->uuid)
                            ->count();
        }
        $data_peserta = Peserta::all();
        $count_peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                        ->where('peserta.pembekalan_uuid', $data->pembekalan->uuid)
                        ->count() > 0;
        return view('pages.pembekalan.index', get_defined_vars());
    }

    public function getPeserta(Request $request, $uuid)
    {
        $peserta = Peserta::where('pembekalan_uuid', $uuid)->orderBy('nama', 'ASC')->get();
        $jml_peserta = Peserta::where('pembekalan_uuid', $uuid)->count();

        return response()->json($peserta, 200);
    }

    public function getPic($id)
    {
        $all = Pic::all();
        $pic = Pic::where('bank_id', $id)->get();
        return json_encode($pic);
    }

    public function store(Request $request)
    {
        $date = date('dmy');
        $time = time();
        $uuid = "Epro-" .''. $date . $time;
        $pembekalan = new Pembekalan;
        $pembekalan->uuid = $uuid;
        $pembekalan->bank_id = $request->bank;
        $pembekalan->materi_id = $request->materi_id;
        $pembekalan->level_id = $request->level_id;
        $pembekalan->investasi = $request->investasi;
        $pembekalan->tanggal_mulai = $request->tanggal_mulai;
        $pembekalan->tanggal_selesai = $request->tanggal_selesai;
        $pembekalan->mulai = $request->mulai;
        $pembekalan->selesai = $request->selesai;
        $pembekalan->metode_id = $request->metode_id;
        $pembekalan->min_peserta = $request->min_peserta;
        $pembekalan->save();

        if ($pembekalan) {
            toastr()->success('Data berhasil ditambahkan');
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $uuid)
    {
        $pembekalan = Pembekalan::firstWhere('uuid', $uuid);
        $pembekalan->link_zoom = $request->zoom;
        $pembekalan->save();

        if ($pembekalan) {
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function done($uuid)
    {
        $pembekalan = Pembekalan::firstWhere('uuid', $uuid);
        $pembekalan->is_done = true;
        $pembekalan->save();

        if ($pembekalan) {
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function detail($uuid)
    {
        $page_name = "Data Pembekalan";

        $no_akhir = Invoice::max('id');
        $no_urut = sprintf("%03s", abs($no_akhir+1));
        $kd_surat = "Fin-EKS/Tag";
        $bln = now()->month;
        $bulan = $this->numberToRoman($bln);

        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $detail_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('tanggal_mulai', 'ASC')->where('uuid',$uuid)->first();
        $surat_penegasan = SuratPenegasan::where('pembekalan_uuid', $uuid)->with('bank')->first();
        $data_peserta = Peserta::with('pembekalan')->where('pembekalan_uuid', $uuid)->orderBy('nama', 'ASC')->get();
        // dd($peserta);
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('tanggal_mulai', 'ASC')->get(); $data_peserta = Peserta::with('pembekalan')->where('pembekalan_uuid', $uuid)->get();
        $slug_bank = Str::slug($surat_penegasan->bank->nama);

        $schedule = Schedule::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'metode_pembekalan','level_pembekalan', 'pic']);
            }])->get();
        foreach($schedule as $data) {
            if($data->pembekalan->is_done == '1')
            {
                $mulai = $data->tanggal;
                $selesai = $data->tanggal;
                $title = $data->pembekalan->materi_pembekalan->kode.' - '.$data->pembekalan->bank->nama;
                $events[] = [
                    'title' => $title,
                    'start' => $mulai,
                    'end' => $selesai,
                    'borderColor' => 'black',
                    'description' => $title,
                    'color' => 'red',
                    'display' => 'background',
                ];
            } else {
                $mulai = $data->tanggal;
                $selesai = $data->tanggal;
                $title = $data->pembekalan->materi_pembekalan->kode.' - '.$data->pembekalan->bank->nama;
                $events[] = [
                    'title' => $title,
                    'start' => $mulai,
                    'end' => $selesai,
                    'borderColor' => 'black',
                    'description' => $title,
                    'color' => 'blue',
                    'display' => 'background',
                ];
            }


            $peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                            ->where('peserta.pembekalan_uuid', $data->pembekalan->uuid)
                            ->get();
            $jml_peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                            ->where('peserta.pembekalan_uuid', $data->pembekalan->uuid)
                            ->count();
        }
        $count_peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                        ->where('peserta.pembekalan_uuid', $data->pembekalan->uuid)
                        ->count() > 0;

        return view('pages.pembekalan.detail', get_defined_vars());
    }

    public function getDetail($uuid)
    {
        $detail_pembekalan = Pembekalan::with(['bank', 'metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'surat_penegasan'])->orderBy('tanggal_mulai', 'ASC')->where('uuid',$uuid)->first();
        return response()->json($detail_pembekalan, 200);
    }

    public function mailInvitation(Request $request, $uuid)
    {
        $email = $request->email_kantor;
        $pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('tanggal_mulai', 'ASC')->where('uuid',$uuid)->first();
        $files = [
            public_path('assets/surat-penawaran/10082022-pt-taspen-pesero.pdf'),
            public_path('upload/6375a7ba2e87e.png'),
        ];
        // dd($pembekalan);
        // Mail::to($request->email_kantor)->send(new InvitationMail($pembekalan));
        // Mail::to($email)->send(new InvitationMail($pembekalan), [],function($message) use ($email, $files){
        //     $message->addAttachment($files);
        // });

        Mail::to($email)->send(new InvitationMail($pembekalan), $pembekalan, function($message) use ($email, $files){
            foreach($files as $file){
                $message->attach($file);
            }
        });

        if(Mail::flushMacros()){
            return response()->with([
                alert()->warning('Gagal', 'Pesanan Gagal')
            ]);
        } else {
            return redirect()->route('pembekalan.index');
        }
    }
}
