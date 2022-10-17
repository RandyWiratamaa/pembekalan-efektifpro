<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $page_name = "Client";
        return view('pages.client.index', get_defined_vars());
    }
}
