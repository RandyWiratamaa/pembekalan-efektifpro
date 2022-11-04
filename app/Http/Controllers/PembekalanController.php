<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\Bank;
use App\Models\Pembekalan;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use App\Models\LevelPembekalan;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;

class PembekalanController extends Controller
{
    public function index()
    {
        $page_name = "Pembekalan";
        $level = LevelPembekalan::all();
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'level_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('hari_tanggal', 'ASC')->get();
        $pembekalan = Pembekalan::all();

        return view('pages.pembekalan.index', get_defined_vars());
    }

    public function getPic($id)
    {
        $pic = Pic::where('bank_id', $id)->pluck("nama", "id");
        return json_encode($pic);
    }

    public function store(Request $request)
    {
        $date = date('dmy');
        $time = time();
        $uuid = "Epro-" .''. $date . $time;
        $pembekalan = new Pembekalan;
        $pembekalan->uuid = $uuid;
        $pembekalan->bank_id = $request->bank;
        $pembekalan->materi_id = $request->materi_id;
        $pembekalan->level_id = $request->level_id;
        $pembekalan->investasi = $request->investasi;
        $pembekalan->hari_tanggal = $request->hari_tanggal;
        $pembekalan->mulai = $request->mulai;
        $pembekalan->selesai = $request->selesai;
        $pembekalan->metode_id = $request->metode_id;
        $pembekalan->min_peserta = $request->min_peserta;
        $pembekalan->save();
        if ($pembekalan) {
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
