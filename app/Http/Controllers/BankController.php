<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Bank;
use App\Models\JenisBank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $page_name = "Bank";
        $jenis_bank = JenisBank::all();
        if ($request->ajax()) {
            $data = Bank::with('jenis_bank');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('jenis_bank', function (Bank $bank) {
                    return $bank->jenis_bank->jenis;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = Bank::all();
        return view('pages.bank.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $bank = new Bank;
        $bank->nama = $request->nama;
        $bank->jenis_id = $request->jenis_id;
        $bank->telephone = $request->no_telp;
        $bank->email = $request->email;
        $bank->alamat = $request->alamat;
        $bank->kota = $request->kota;
        $bank->kode_pos = $request->kode_pos;
        $bank->save();

        if ($bank) {
            return redirect()->route('bank.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $update_bank = Bank::firstWhere('id', $id);
        $update_bank->nama = $request->nama;
        $update_bank->jenis_id = $request->jenis_id;
        $update_bank->telephone = $request->no_telp;
        $update_bank->email = $request->email;
        $update_bank->alamat = $request->alamat;
        $update_bank->kota = $request->kota;
        $update_bank->kode_pos = $request->kode_pos;
        $update_bank->save();
        if($update_bank) {
            return redirect()->route('bank.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $delete_bank = Bank::findOrFail($id);
        $delete_bank->delete();
        if($delete_bank) {
            return redirect()->route('bank.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
