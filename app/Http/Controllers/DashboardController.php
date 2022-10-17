<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $page_name = "Dashboard";
        return view('pages.dashboard.index', get_defined_vars());
    }
}
