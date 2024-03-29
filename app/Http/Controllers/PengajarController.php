<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index(Request $request)
    {
        $page_name = "Pengajar";
        $data = Pengajar::all();

        if ($request->ajax()) {
            $data = Pengajar::orderBy('nama', 'ASC');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.pengajar.index', get_defined_vars());
    }
    public function store(Request $request)
    {
        $pengajar = new Pengajar;
        $pengajar->nama = $request->nama;
        $pengajar->email = $request->email;
        $pengajar->no_hp = $request->no_hp;
        $pengajar->jenkel = $request->jenkel;
        $pengajar->photo = $request->photo;
        $pengajar->save();

        if($pengajar) {
            toastr()->success('Data berhasil ditambahkan');
            return redirect()->route('pengajar.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $pengajar = Pengajar::firstWhere('id', $id);
        $pengajar->nama = $request->nama;
        $pengajar->email = $request->email;
        $pengajar->no_hp = $request->no_hp;
        $pengajar->jenkel = $request->jenkel;
        $pengajar->photo = $request->photo;
        $pengajar->save();

        if($pengajar) {
            toastr()->success('Data berhasil diubah');
            return redirect()->route('pengajar.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $pengajar = Pengajar::findOrFail($id);
        $pengajar->delete();

        if($pengajar) {
            toastr()->success('Data berhasil dihapus');
            return redirect()->route('pengajar.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
