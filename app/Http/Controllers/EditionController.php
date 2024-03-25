<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EditionController extends Controller
{
    public function view()
    {
        $editions = DB::select('select * from mdm.dim_edition');

        return view('layout', ['editions' => $editions]);
    }
}
