<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function store(Request $request)
    {
        $peserta = new Peserta;
        $peserta->nama = $request->nama;
        $peserta->nik = $request->nik;
        $peserta->jabatan = $request->jabatan;
        $peserta->nohp = $request->nohp;
        $peserta->jenkel = $request->jenkel;
        $peserta->email_kantor = $request->email_kantor;
        $peserta->email_pribadi = $request->email_pribadi;
        $peserta->alamat = $request->alamat;
        $peserta->alamat = $request->alamat;
        $peserta->pembekalan_uuid = $request->uuid;
        $peserta->save();

        if ($peserta) {
            return redirect()->route('pembekalan.index');
        }
    }
}
