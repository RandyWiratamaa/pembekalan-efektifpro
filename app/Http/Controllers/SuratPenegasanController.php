<?php

namespace App\Http\Controllers;

use App\Models\Pembekalan;
use Illuminate\Http\Request;
use App\Models\SuratPenegasan;

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

    public function index()
    {
        $page_name = "Surat Penegasan";
        $surat_penegasan = SuratPenegasan::with(['materi_pembekalan', 'level_pembekalan', 'bank'])->get();
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

    public function view($id)
    {
        $surat_penegasan = SuratPenegasan::with('bank')->firstWhere('id', $id);
        return view('pages.surat-penegasan.detail', get_defined_vars());
    }
}
