<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Imports\PesertaImport;
use Maatwebsite\Excel\Facades\Excel;

class PesertaController extends Controller
{
    public function index()
    {
        $pege_name = "Peserta";
        $data = Peserta::all();
        return view('pages.peserta.index');
    }

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
            toastr()->success('Data peserta berhasil ditambahkan');
            return redirect()->route('pembekalan.index')->refresh();
        }
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::firstWhere('id', $id);
        $peserta->nama = $request->nama;
        $peserta->nik = $request->nik;
        $peserta->jabatan = $request->jabatan;
        $peserta->nohp = $request->nohp;
        $peserta->jenkel = $request->jenkel;
        $peserta->email_kantor = $request->email_kantor;
        $peserta->email_pribadi = $request->email_pribadi;
        $peserta->alamat = $request->alamat;
        $peserta->save();

        if ($peserta) {
            toastr()->success('Data peserta berhasil diubah');
            return redirect()->route('pembekalan.index');
        }
    }

    public function import_excel(Request $request)
    {
        $uuid = $request->uuid;

        Excel::import(new PesertaImport($uuid),
            $request->file('file')->store('files'));
        toastr()->success('Data peserta berhasil diimport');
        return redirect()->route('pembekalan.index');
    }

    public function destroy($id)
    {
        $delete_peserta = Peserta::findOrFail($id);
        $delete_peserta->delete();

        if($delete_peserta) {
            toastr()->success('Data peserta berhasil dihapus');
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
