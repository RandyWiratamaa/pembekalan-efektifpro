<?php

namespace App\Http\Controllers;

use App\Models\Bpo;
use App\Models\Pic;
use App\Models\Bank;
use App\Models\Pengajar;
use App\Models\Schedule;
use App\Models\Pembekalan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Penyelenggara;
use App\Models\SuratPenegasan;
use App\Models\JenisPembekalan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\SuratPenegasanMail;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SuratPenegasanController extends Controller
{
    private $n = 3;

    //Fungsi untuk generate UUID
    public function uuid($n)
    {
        $string = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = '';

        for($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($string) - 1);
            $random .= $string[$index];
        }

        return $random;
    }

    public function index(Request $request)
    {
        $page_name = "Surat Penegasan";
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $pengajar = Pengajar::all();
        $bank = Bank::all();
        $bpo = Bpo::all();
        $pic = Pic::all();
        $penyelenggara = Penyelenggara::all();
        $jenis = JenisPembekalan::all();

        if($request->get('bank_id')){
            $surat_penegasan = SuratPenegasan::with([
                'pembekalan' => function($q) {
                    return $q->with(['pengajar', 'metode_pembekalan', 'pic']);
                }
                , 'materi_pembekalan', 'level_pembekalan', 'bank', 'penyelenggara', 'jenis_pembekalan'
            ])->where('bank_id', $request->get('bank_id'))->get();
        } else{
            $surat_penegasan = SuratPenegasan::with([
                    'pembekalan' => function($q) {
                        return $q->with(['pengajar', 'metode_pembekalan', 'pic']);
                    }
                    , 'materi_pembekalan', 'level_pembekalan', 'bank', 'penyelenggara', 'jenis_pembekalan'
                ])->get();
        }
        return view('pages.surat-penegasan.index', get_defined_vars());
    }

    public function show($id)
    {
        $page_name = "Surat Penegasan";
        $penegasan_isExist = SuratPenegasan::where('pembekalan_id', $id)->count() > 0;
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'level_pembekalan', 'materi_pembekalan'])->where('id', $id)->first();
        $surat_penegasan = SuratPenegasan::where('pembekalan_id', $id)->with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'level_pembekalan']);
            }
            , 'bank'])->get();
        return view('pages.surat-penegasan.show', get_defined_vars());
    }

    public function store(Request $request)
    {
        $string = $this->uuid($this->n);
        $now = now()->format('dmy');

        $uuid = 'EKS-'.$now.'-'.$string;
        $pembekalan = new Pembekalan;
        $pembekalan->uuid = $uuid;
        $pembekalan->jenis_id = $request->jenis_id;
        $pembekalan->penyelenggara_id = $request->penyelenggara;
        $pembekalan->bank_id = $request->bank_id;
        $pembekalan->pic_id = $request->pic_id;
        $pembekalan->materi_id = $request->materi_id;
        $pembekalan->metode_id = $request->metode_id;
        $pembekalan->investasi = $request->investasi;
        $pembekalan->tanggal_mulai = $request->tanggal_mulai;
        $pembekalan->tanggal_selesai = $request->tanggal_selesai;
        $pembekalan->mulai = $request->mulai;
        $pembekalan->selesai = $request->selesai;
        $pembekalan->min_peserta = $request->min_peserta;
        $pembekalan->pengajar_id = $request->pengajar_id;
        $pembekalan->save();

        $data = [
            ['pembekalan_uuid'=>$uuid, 'tanggal'=>$request->tanggal_mulai, 'pengajar_id'=>$request->pengajar_id],
            ['pembekalan_uuid'=>$uuid, 'tanggal'=>$request->tanggal_selesai, 'pengajar_id'=>$request->pengajar_id],
        ];
        Schedule::insert($data);

        // DB:table('schedule')->insert($data);
        // $schedule = new Schedule;
        // $schedule->pembekalan_uuid = $uuid;
        // $schedule->tanggal = $request->tanggal_mulai,$request->tanggal_selesai;
        // $schedule->save();

        $surat_penegasan = new SuratPenegasan;
        $surat_penegasan->no_surat_penawaran = $request->no_surat_penawaran;
        $surat_penegasan->penyelenggara_id = $request->penyelenggara;
        $surat_penegasan->jenis_id = $request->jenis_id;
        $surat_penegasan->pembekalan_uuid = $uuid;
        $surat_penegasan->no_surat = $request->no_surat;
        $surat_penegasan->tgl_surat = $request->tgl_surat;
        $surat_penegasan->bank_id = $request->bank_id;
        $surat_penegasan->pic_id = $request->pic_id;
        $surat_penegasan->perihal = $request->perihal;
        $surat_penegasan->body = $request->body_penegasan;
        $surat_penegasan->save();

        if($surat_penegasan && $pembekalan){
            toastr()->success('Surat Penegasan dan Jadwal berhasil dibuat');
            return redirect()->route('surat-penegasan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $uuid)
    {
        $update_pembekalan = Pembekalan::firstWhere('uuid', $uuid);
        $update_pembekalan->bank_id = $request->bank_id;
        $update_pembekalan->pic_id = $request->pic_id;
        $update_pembekalan->materi_id = $request->materi_id;
        $update_pembekalan->investasi = $request->investasi;
        $update_pembekalan->pengajar_id = $request->pengajar_id;
        $update_pembekalan->tanggal_mulai = $request->tanggal_mulai;
        $update_pembekalan->tanggal_selesai = $request->tanggal_selesai;
        $update_pembekalan->mulai = $request->mulai;
        $update_pembekalan->selesai = $request->selesai;
        $update_pembekalan->metode_id = $request->metode_id;
        $update_pembekalan->min_peserta = $request->min_peserta;
        $update_pembekalan->save();

        $data = [
            ['pembekalan_uuid'=>$uuid, 'tanggal'=>$request->tanggal_mulai],
            ['pembekalan_uuid'=>$uuid, 'tanggal'=>$request->tanggal_selesai],
        ];
        Schedule::where([
                ['pembekalan_uuid', $uuid],
                ['ket', 'mulai']
            ])->update(['tanggal' => $request->tanggal_mulai]);

        Schedule::where([
                ['pembekalan_uuid', $uuid],
                ['ket', 'selesai']
            ])->update(['tanggal' => $request->tanggal_selesai]);

        // Schedule::update($data)->where('pembekalan_uuid', $uuid);
        // DB::table('schedule')->where('pembekalan_uuid', $uuid)->update($data);

        $update_penegasan = SuratPenegasan::firstWhere('pembekalan_uuid', $uuid);
        $update_penegasan->no_surat = $request->no_surat;
        $update_penegasan->tgl_surat = $request->tgl_surat;
        $update_penegasan->bank_id = $request->bank_id;
        $update_penegasan->pic_id = $request->pic_id;
        $update_penegasan->perihal = $request->perihal;
        $update_penegasan->body = $request->body_penegasan;
        $update_penegasan->save();

        if($update_pembekalan && $update_penegasan){
            toastr()->success('Surat Penegasan dan Jadwal berhasil diubah');
            return redirect()->route('surat-penegasan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $surat_penegasan = SuratPenegasan::with('bank')->firstWhere('id', $id);
        return view('pages.surat-penegasan.detail', get_defined_vars());
    }

    public function viewer($id)
    {
        $surat_penegasan = SuratPenegasan::with('bank')->firstWhere('id', $id);
        return view('pages.surat-penegasan.viewer', get_defined_vars());
    }

    public function approve(Request $request, $id)
    {
        $approved = 1;
        $approve_penegasan = SuratPenegasan::firstWhere('id', $id);
        $approve_penegasan->is_approved = $approved;
        $approve_penegasan->approved_by = $request->approved_by;
        $approve_penegasan->save();
        if ($approve_penegasan) {
            toastr()->success('Surat Penegasan berhasil diapprove');
            return redirect()->route('surat-penegasan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function generatePDF($id)
    {
        $surat_penegasan = SuratPenegasan::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'level_pembekalan', 'pic']);
            }
            , 'bank', 'bpo'])->firstWhere('id', $id);
        $slug_bank = Str::slug($surat_penegasan->bank->nama);
        $filename = "{$surat_penegasan->tgl_surat->isoFormat('DDMMYYYY')}-{$slug_bank}.pdf";
        $surat_penegasan->dokumen = $filename;
        $surat_penegasan->save();

        $path = public_path('assets/surat-penegasan');
        $data = [
            'surat_penegasan' => $surat_penegasan
        ];
        $body = explode(" ", $surat_penegasan->body);
        $body = $surat_penegasan->body;
        $exp = explode("<br>", $body);
        $pdf = Pdf::loadView('pages.surat-penegasan.download', $data);
        $pdf->save($path . '/' . $filename);
        if($surat_penegasan){
            toastr()->success('Surat Penegasan berhasil disimpan');
            return $pdf->download($filename);
        }
    }

    public function destroy($id)
    {
        $delete_penegasan = SuratPenegasan::findOrFail($id);
        $delete_penegasan->delete();
        if($delete_penegasan) {
            toastr()->success('Surat Penegasan berhasil dihapus');
            return redirect()->route('surat-penegasan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function sendEMail(Request $request, $uuid)
    {
        $email = $request->email_pic;
        $surat_penegasan = SuratPenegasan::with([
            'pembekalan' => function($q) {
                return $q->with(['pengajar', 'metode_pembekalan', 'pic']);
            }
            , 'materi_pembekalan', 'level_pembekalan', 'bank', 'penyelenggara', 'jenis_pembekalan'
        ])->where('pembekalan_uuid', $uuid)->first();

        Mail::to($email)->send(new SuratPenegasanMail($surat_penegasan));

        if(Mail::flushMacros()){
            return response()->with([
                alert()->warning('Gagal', 'Pesanan Gagal')
            ]);
        } else {
            // DB::table('surat_penegasan')->where('pembekalan_uuid', $uuid)->update(['status', 1]);
            SuratPenegasan::where([
                ['pembekalan_uuid', $uuid]
            ])->update(['status' => 1]);
            toastr()->success('Surat Penegasan berhasil dikirim ke email PIC');
            return redirect()->route('surat-penegasan.index');
        }
    }
}
