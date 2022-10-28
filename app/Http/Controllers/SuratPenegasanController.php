<?php

namespace App\Http\Controllers;

use App\Models\Pembekalan;
use Illuminate\Http\Request;
use App\Models\SuratPenegasan;

class SuratPenegasanController extends Controller
{
    public function index($id)
    {
        $page_name = "Surat Penegasan";
        $penegasan_isExist = SuratPenegasan::where('pembekalan_id', $id)->count() > 0;
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'level_pembekalan', 'materi_pembekalan'])->where('id', $id)->first();
        return view('pages.surat-penegasan.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $surat_penegasan = new SuratPenegasan;
        $surat_penegasan->no_surat = $request->no_surat;
        $surat_penegasan->tgl_surat = $request->tgl_surat;
        $surat_penegasan->bank_id = $request->bank_id;
        $surat_penegasan->pembekalan_id = $request->pembekalan_id;
        $surat_penegasan->perihal = $request->perihal;
        $surat_penegasan->body = $request->body;
        $surat_penegasan->save();
        if($surat_penegasan){
            return redirect()->route('pembekalan.index');
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
