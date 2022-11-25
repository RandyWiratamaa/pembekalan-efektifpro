<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Support\Str;
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
        $data = MateriPembekalan::all();

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
        $file_materi = $request->file('file_materi');
        $slug_nama = Str::slug($request->nama);
        $slug_kode = Str::slug($request->kode);
        $name = $slug_nama.'-'.$slug_kode;
        $ext = $file_materi->getClientOriginalExtension();
        $nameWithExt = $name . '.' . $ext;
        $path = $file_materi->move('assets/materi-pembekalan',$nameWithExt);

        $materi = new MateriPembekalan;
        $materi->materi = $request->nama;
        $materi->kode = $request->kode;
        $materi->file_materi = $nameWithExt;
        $materi->save();

        if($materi){
            toastr()->success('Data berhasil ditambahkan');
            return redirect()->route('materi_pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $file_materi = $request->file('file_materi');
        $slug_nama = Str::slug($request->nama);
        $slug_kode = Str::slug($request->kode);
        $name = $slug_nama.'-'.$slug_kode;
        $ext = $file_materi->getClientOriginalExtension();
        $nameWithExt = $name . '.' . $ext;
        $path = $file_materi->move('assets/materi-pembekalan',$nameWithExt);

        $materi = MateriPembekalan::firstWhere('id', $id);
        $materi->kode = $request->kode;
        $materi->materi = $request->nama;
        $materi->file_materi = $nameWithExt;
        $materi->save();

        if($materi) {
            toastr()->success('Data berhasil diubah');
            return redirect()->route('materi_pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $delete_materi = MateriPembekalan::findOrFail($id);
       $delete_materi->delete();

        if($delete_materi) {
            toastr()->success('Data berhasil dihapus');
            return redirect()->route('materi_pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
