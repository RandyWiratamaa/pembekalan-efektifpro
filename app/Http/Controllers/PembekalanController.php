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
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'level_pembekalan', 'materi_pembekalan'])->get();
        $pembekalan = Pembekalan::all();
        foreach($pembekalan as $i) {
            $penawaran_isExist = SuratPenawaran::where('pembekalan_id', $i->id)->get();
            $check_penawaran_isNotApproved = SuratPenawaran::select('surat_penawaran.*')
                                            ->join('pembekalan', 'pembekalan.id', '=', 'surat_penawaran.pembekalan_id')
                                            ->where([
                                                        ['surat_penawaran.is_approved', '0'],
                                                        ['surat_penawaran.pembekalan_id', $i->id]
                                                    ])->count() > 0;
            $data_penawaran_isNotApproved = SuratPenawaran::where('is_approved', '0')->with([
                'pembekalan' => function($query){
                    return $query->with(['materi_pembekalan', 'level_pembekalan']);
                }
                , 'bank'])->get();

                $check_penegasan_isNotApproved = SuratPenegasan::select('surat_penegasan.*')
                                                ->join('pembekalan', 'pembekalan.bank_id', '=', 'surat_penegasan.bank_id')
                                                ->where([
                                                            ['surat_penegasan.is_approved', '0'],
                                                            ['surat_penegasan.bank_id', $i->bank_id]
                                                        ])->count() > 0;

            $data_penegasan_isNotApproved = SuratPenegasan::where('is_approved', '0')->with([
                'pembekalan' => function($query){
                    return $query->with(['materi_pembekalan', 'level_pembekalan']);
                }
                , 'bank'])->get();
                // var_dump($check_penawaran_isNotApproved);
                // var_dump($penawaran_isExist);
            }
            // die();


        $not_approved = SuratPenawaran::with(['bank', 'pembekalan'])->get();
        return view('pages.pembekalan.index', get_defined_vars());
    }

    public function getPic($id)
    {
        $pic = Pic::where('bank_id', $id)->pluck("nama", "id");
        // die($kota);
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
