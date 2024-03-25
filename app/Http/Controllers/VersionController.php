<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VersionController extends Controller
{
    public function view()
    {
        $versions = DB::select('select * from mdm.dim_version');

        return view('layout', ['versions' => $versions]);
    }
}
