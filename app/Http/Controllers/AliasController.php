<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class AliasController extends Controller
{
    public function index()
    {
        $alias = DB::table('mdm.alias')->orderBy('alias', 'asc')
            ->get();

        $os_join = DB::table('mdm.fact_operating_system')
            ->join('mdm.dim_distribution', 'fact_operating_system.distribution_id', '=', 'dim_distribution.id')
            ->join('mdm.dim_edition', 'fact_operating_system.edition_id', '=', 'dim_edition.id')
            ->join('mdm.dim_version', 'fact_operating_system.version_id', '=', 'dim_version.id')
            ->join('mdm.dim_family', 'fact_operating_system.family_id', '=', 'dim_family.id')
            ->select('fact_operating_system.os_id', 'dim_distribution.distribution_name', 'dim_edition.edition_name', 'dim_version.version_number')
            ->get();

        return view('layout', ['alias' => $alias, 'os_join' => $os_join]);
    }

    public function updateAlias(Request $request)
    {
        $fact_id = $request->get('factPicker');
        $alias_id = $request->get('aliasId');

        DB::table('mdm.alias')
            ->where('id', '=', $alias_id)
            ->update(['fact_id' => $fact_id]);

        return redirect('alias');
    }

    public function deleteAlias(Request $request)
    {
        $alias_id = $request->get('aliasId');

        DB::table('mdm.alias')
            ->where('id', '=', $alias_id)
            ->delete();

        return redirect('alias');
    }
}
