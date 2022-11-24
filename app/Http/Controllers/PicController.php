<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Pic;
use App\Models\Bank;
use Illuminate\Http\Request;

class PicController extends Controller
{
    public function index(Request $request)
    {
        $page_name = "PIC";
        $bank = Bank::all();
        $pic = Pic::with('bank')->get();

        if ($request->ajax()) {
            $data = Pic::with('bank')->orderBy('bank_id', 'ASC');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('nama_bank', function (Pic $pic) {
                    return $pic->bank->nama;
                })
                ->addColumn('alamat_bank', function (Pic $pic) {
                    return $pic->bank->alamat;
                })
                ->addColumn('bank', function (Pic $pic) {
                    return $pic->bank->alamat;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.pic.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $pic = new Pic;
        $pic->first_name = $request->nama_depan;
        $pic->midle_name = $request->nama_tengah;
        $pic->last_name = $request->nama_belakang;
        $pic->tgl_lahir = $request->tgl_lahir;
        $pic->jenkel = $request->jenkel;
        $pic->no_hp = $request->no_hp;
        $pic->bank_id = $request->bank_id;
        $pic->alamat_rumah = $request->alamat_rumah;
        $pic->email_pribadi = $request->email_pribadi;
        $pic->email_kantor = $request->email_kantor;
        $pic->jabatan = $request->jabatan;
        $pic->photo = $request->photo;
        $pic->save();

        if ($pic) {
            return redirect()->route('pic.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $pic = Pic::firstWhere('id', $id);
        $pic->first_name = $request->nama_depan;
        $pic->midle_name = $request->nama_tengah;
        $pic->last_name = $request->nama_belakang;
        $pic->tgl_lahir = $request->tgl_lahir;
        $pic->jenkel = $request->jenkel;
        $pic->no_hp = $request->no_hp;
        $pic->bank_id = $request->bank_id;
        $pic->alamat_rumah = $request->alamat_rumah;
        $pic->email_pribadi = $request->email_pribadi;
        $pic->email_kantor = $request->email_kantor;
        $pic->jabatan = $request->jabatan;
        $pic->photo = $request->photo;
        $pic->save();

        if ($pic) {
            return redirect()->route('pic.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $delete_pic = Pic::findOrFail($id);
        $delete_pic->delete();

        if($delete_pic) {
            return redirect()->route('pic.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
