<?php

namespace App\Http\Controllers;

use App\Models\Bpo;
use App\Models\Pic;
use App\Models\Bank;
use App\Models\Pengajar;
use App\Models\Pembekalan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SuratPenegasan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;

class SuratPenegasanController extends Controller
{
    private $n = 3;

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
        if($request->get('bank_id')){
            $surat_penegasan = SuratPenegasan::with([
                'pembekalan' => function($q) {
                    return $q->with(['pengajar', 'metode_pembekalan', 'pic']);
                }
                , 'materi_pembekalan', 'level_pembekalan', 'bank'
            ])->where('bank_id', $request->get('bank_id'))->get();
        } else{
            $surat_penegasan = SuratPenegasan::with([
                    'pembekalan' => function($q) {
                        return $q->with(['pengajar', 'metode_pembekalan', 'pic']);
                    }
                    , 'materi_pembekalan', 'level_pembekalan', 'bank'
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
        $pembekalan->bank_id = $request->bank_id;
        $pembekalan->pic_id = $request->pic_id;
        $pembekalan->materi_id = $request->materi_id;
        $pembekalan->investasi = $request->investasi;
        $pembekalan->pengajar_id = $request->pengajar_id;
        $pembekalan->hari_tanggal = $request->hari_tanggal;
        $pembekalan->mulai = $request->mulai;
        $pembekalan->selesai = $request->selesai;
        $pembekalan->metode_id = $request->metode_id;
        $pembekalan->min_peserta = $request->min_peserta;
        $pembekalan->save();

        $surat_penegasan = new SuratPenegasan;
        $surat_penegasan->no_surat_penawaran = $request->no_surat_penawaran;
        $surat_penegasan->pembekalan_uuid = $uuid;
        $surat_penegasan->no_surat = $request->no_surat;
        $surat_penegasan->tgl_surat = $request->tgl_surat;
        $surat_penegasan->bank_id = $request->bank_id;
        $surat_penegasan->pic_id = $request->pic_id;
        $surat_penegasan->perihal = $request->perihal;
        $surat_penegasan->body = $request->body_penegasan;
        $surat_penegasan->save();

        if($surat_penegasan && $pembekalan){
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
        $update_pembekalan->hari_tanggal = $request->hari_tanggal;
        $update_pembekalan->mulai = $request->mulai;
        $update_pembekalan->selesai = $request->selesai;
        $update_pembekalan->metode_id = $request->metode_id;
        $update_pembekalan->min_peserta = $request->min_peserta;
        $update_pembekalan->save();

        $update_penegasan = SuratPenegasan::firstWhere('pembekalan_uuid', $uuid);
        $update_penegasan->no_surat = $request->no_surat;
        $update_penegasan->tgl_surat = $request->tgl_surat;
        $update_penegasan->bank_id = $request->bank_id;
        $update_penegasan->pic_id = $request->pic_id;
        $update_penegasan->perihal = $request->perihal;
        $update_penegasan->body = $request->body_penegasan;
        $update_penegasan->save();

        if($update_pembekalan && $update_penegasan){
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
        $path = public_path('assets/surat-penegasan');
        $data = [
            'surat_penegasan' => $surat_penegasan
        ];
        $body = explode(" ", $surat_penegasan->body);
        $body = $surat_penegasan->body;
        $exp = explode("<br>", $body);
        $pdf = Pdf::setOption(['dpi' => 150]);
        $pdf = Pdf::loadView('pages.surat-penegasan.download', $data)->setPaper('A4', 'potrait');
        $pdf->save($path . '/' . $filename);
        return $pdf->download($filename);

        // $pdf = Pdf::setPaper('a4', 'potrait');
        // $pdf = Pdf::loadHtml($surat_penawaran->body)->setPaper('a4', 'potrait')->setWarnings(false);
        // $pdf = Pdf::render();
        // return $pdf->stream();
    }

    public function destroy($id)
    {
        $delete_penegasan = SuratPenegasan::findOrFail($id);
        $delete_penegasan->delete();
        if($delete_penegasan) {
            return redirect()->route('surat-penegasan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
