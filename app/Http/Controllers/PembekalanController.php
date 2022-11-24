<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\Bank;
use App\Models\Peserta;
use App\Models\Schedule;
use App\Models\Pembekalan;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use App\Models\LevelPembekalan;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;
use Illuminate\Support\Facades\Mail;

class PembekalanController extends Controller
{
    public function rand_color()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    public function index(Request $request)
    {
        $page_name = "Pembekalan";
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $data_pembekalan = Pembekalan::with([
            'metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'peserta', 'schedule'
            ])->orderBy('tanggal_mulai', 'ASC')->get();
        $pembekalan = Pembekalan::all();
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

    public function detail($uuid)
    {
        $page_name = "Data Pembekalan";
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $detail_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('tanggal_mulai', 'ASC')->where('uuid',$uuid)->first();
        $surat_penegasan = SuratPenegasan::where('pembekalan_uuid', $uuid)->with('bank')->first();
        $peserta = Peserta::with('pembekalan')->where('pembekalan_uuid', $uuid)->orderBy('nama', 'ASC')->get();
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('tanggal_mulai', 'ASC')->get(); $data_peserta = Peserta::with('pembekalan')->where('pembekalan_uuid', $uuid)->get();
        $slug_bank = Str::slug($surat_penegasan->bank->nama);

        return view('pages.pembekalan.detail', get_defined_vars());
    }

    public function getDetail($uuid)
    {
        $detail_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('tanggal_mulai', 'ASC')->where('uuid',$uuid)->first();
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
