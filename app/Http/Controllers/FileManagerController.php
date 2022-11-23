<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;

class FileManagerController extends Controller
{
    public function index()
    {
        $surat_penawaran = SuratPenawaran::with(['bank', 'materi_pembekalan'])->get();
        $surat_penegasan = SuratPenegasan::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'level_pembekalan', 'pic']);
            }
            , 'bank', 'bpo'])->get();
        $berita_acara = BeritaAcara::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'bank', 'pic']);
            }])->get();
        return view('pages.filemanager.index', get_defined_vars());
    }
}
