<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Models\Bank;
use App\Models\Peserta;
use App\Models\Pembekalan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use App\Models\LevelPembekalan;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;

class PembekalanController extends Controller
{
    public function index(Request $request)
    {
        $page_name = "Pembekalan";
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'peserta'])->orderBy('hari_tanggal', 'ASC')->get();
        $pembekalan = Pembekalan::all();
        $surat_penegasan = SuratPenegasan::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'level_pembekalan', 'pic']);
            }
            , 'bank', 'bpo'])->get();

        $events = [];
        foreach($data_pembekalan as $values) {
            $mulai = $values->hari_tanggal;
            $selesai = $values->hari_tanggal;
            $title = $values->materi_pembekalan->kode.' - '.$values->bank->nama;
            $events[] = [
                'title' => $title,
                'start' => $mulai,
                'end' => $selesai,
                'borderColor' => 'black',
                'display' => 'background'
            ];

            $peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                            ->where('peserta.pembekalan_uuid', $values->uuid)
                            ->get();
            $jml_peserta = Peserta::join('pembekalan', 'pembekalan.uuid', '=', 'peserta.pembekalan_uuid')
                            ->where('peserta.pembekalan_uuid', $values->uuid)
                            ->count();
        }
        return view('pages.pembekalan.index', get_defined_vars());
    }

    public function getPeserta(Request $request, $uuid)
    {
        $peserta = Peserta::where('pembekalan_uuid', $uuid)->orderBy('nama', 'ASC')->get();
        $jml_peserta = Peserta::where('pembekalan_uuid', $uuid)->count();

        return response()->json($peserta, 200);
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

    public function update(Request $request, $uuid)
    {
        $pembekalan = Pembekalan::firstWhere('uuid', $uuid);
        $pembekalan->link_zoom = $request->zoom;
        $pembekalan->save();
        if ($pembekalan) {
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function detail($uuid)
    {
        $page_name = "Data Pembekalan";
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $detail_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('hari_tanggal', 'ASC')->where('uuid',$uuid)->first();
        $surat_penegasan = SuratPenegasan::where('pembekalan_uuid', $uuid)->with('bank')->first();
        $peserta = Peserta::with('pembekalan')->where('pembekalan_uuid', $uuid)->orderBy('nama', 'ASC')->get();
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('hari_tanggal', 'ASC')->get(); $data_peserta = Peserta::with('pembekalan')->where('pembekalan_uuid', $uuid)->get();
        $slug_bank = Str::slug($surat_penegasan->bank->nama);
        // die($surat_penegasan);
        return view('pages.pembekalan.detail', get_defined_vars());
    }

    public function getDetail($uuid)
    {
        $detail_pembekalan = Pembekalan::with(['metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic'])->orderBy('hari_tanggal', 'ASC')->where('uuid',$uuid)->first();
        return response()->json($detail_pembekalan, 200);
    }
}
