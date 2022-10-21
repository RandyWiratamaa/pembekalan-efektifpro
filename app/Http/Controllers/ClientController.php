<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $page_name = "Client";
        if ($request->ajax()) {
            $data = Client::orderBy('id', 'ASC');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = Client::all();
        return view('pages.client.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $client = new Client;
        $client->nama = $request->nama;
        $client->alamat = $request->alamat;
        $client->kota = $request->kota;
        $client->kode_pos = $request->kode_pos;
        $client->no_telp = $request->no_telp;
        $client->pic = $request->pic;
        $client->email_pic = $request->email_pic;
        $client->jabatan_pic = $request->jabatan_pic;
        $client->kerjasama = $request->has('kerjasama');
        $client->save();

        if ($client) {
            return redirect()->route('client.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
