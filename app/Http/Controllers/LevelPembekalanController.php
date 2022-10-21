<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelPembekalan;

class LevelPembekalanController extends Controller
{
    public function index()
    {
        $level = LevelPembekalan::all();
        return view('pages.table-master.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $level = new LevelPembekalan;
        $level->level = $request->level;
        $level->save();

        if ($level) {
            return view('pages.table-master.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
