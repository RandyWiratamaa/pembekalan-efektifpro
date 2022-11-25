<?php

namespace App\Http\Controllers;

use App\Models\Bpo;
use Illuminate\Http\Request;

class BpoController extends Controller
{
    public function index()
    {
        $page_name = 'BPO';
        $bpo = Bpo::all();
        return view('pages.bpo.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $folderPath = public_path('assets/signature/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file_name = uniqid() . '.'.$image_type;

        $file = $folderPath . $file_name;

        $bpo = new Bpo;
        $bpo->nama = $request->nama;
        $bpo->email = $request->email;
        $bpo->jabatan = $request->jabatan;
        $bpo->signature = $file_name;
        $bpo->photo = $request->photo;
        $bpo->save();
        if($bpo){
            file_put_contents($file, $image_base64);
            toastr()->success('Data BPO berhasil ditambahkan');
            return redirect()->route('bpo.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
