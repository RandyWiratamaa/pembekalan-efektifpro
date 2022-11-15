<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;

class BeritaAcaraController extends Controller
{
    public function index()
    {
        $page_name = 'Berita Acara';
        $bank = Bank::all();
        $berita_acara = BeritaAcara::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'bank']);
            }
            ])->get();
        return view('pages.berita-acara.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $berita_acara = new BeritaAcara;
        $berita_acara->tanggal = $request->tanggal;
        $berita_acara->pembekalan_uuid = $request->uuid;
        $berita_acara->body = $request->body;
        $berita_acara->absensi = $request->absensi;
        $berita_acara->dokumentasi = $request->dokumentasi;
        $berita_acara->save();

        if ($berita_acara) {
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $berita_acara = BeritaAcara::firstWhere('id', $id);
        return view('pages.berita-acara.detail', get_defined_vars());
    }
}
