<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    public function index()
    {
        $page_name = "Table Master";
        return view('pages.table-master.index', get_defined_vars());
    }
}
