<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPenawaran;

class SuratPenawaranController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $surat_penawaran = new SuratPenawaran;
        $surat_penawaran->no_surat = $request->no_surat;
        $surat_penawaran->tgl_surat = $request->tgl_surat;
        $surat_penawaran->bank_id = $request->bank_id;
        $surat_penawaran->pembekalan_id = $request->pembekalan_id;
        $surat_penawaran->perihal = $request->perihal;
        $surat_penawaran->body = $request->body;
        $surat_penawaran->save();
        if($surat_penawaran){
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $surat_penawaran = SuratPenawaran::with('bank')->firstWhere('id', $id);
        return view('pages.surat-penawaran.detail', get_defined_vars());
    }
}
