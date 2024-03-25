<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OSController extends Controller
{
    public function index()
    {
        $os_join = DB::table('mdm.fact_operating_system')
            ->join('mdm.dim_distribution', 'fact_operating_system.distribution_id', '=', 'dim_distribution.id')
            ->join('mdm.dim_edition', 'fact_operating_system.edition_id', '=', 'dim_edition.id')
            ->join('mdm.dim_version', 'fact_operating_system.version_id', '=', 'dim_version.id')
            ->join('mdm.dim_family', 'fact_operating_system.family_id', '=', 'dim_family.id')
            ->select('dim_distribution.distribution_name', 'dim_edition.edition_name', 'dim_version.version_number')
            ->get();

        return view('layout', ['os_join' => $os_join]);
    }
}
