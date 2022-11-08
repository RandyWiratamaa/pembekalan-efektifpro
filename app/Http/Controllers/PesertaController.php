<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function import_excel(Request $request)
    {
        // $this->validate($request, [
		// 	'file' => 'required|mimes:csv,xls,xlsx'
		// ]);

        // $file = $request->file('file');
        // $nama_file = rand().getClientOriginalName();

        // $file->move('peserta', $nama_file);
        // Excell::import(new SiswaImport, public_path('/peserta/'.$nama_file));
        $uuid = $request->uuid;

        Excel::import(new PesertaImport($uuid),
            $request->file('file')->store('files'));
        return redirect()->route('pembekalan.index');
    }
}
