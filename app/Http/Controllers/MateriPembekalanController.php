<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Models\JenisPembekalan;
use App\Models\LevelPembekalan;
use App\Models\MateriPembekalan;

class MateriPembekalanController extends Controller
{
    public function index(Request $request)
    {
        $page_name = "Program Pembekalan";
        $jenis = JenisPembekalan::all();
        $level = LevelPembekalan::all();
        if ($request->ajax()) {
            $data = MateriPembekalan::orderBy('kode', 'ASC');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.materi.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $materi = new MateriPembekalan;
        $materi->materi = $request->nama;
        $materi->kode = $request->kode;
        $materi->save();

        if($materi){
            return redirect()->route('materi_pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
