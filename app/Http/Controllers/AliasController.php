<?php

namespace App\Http\Controllers;

use App\Models\Alias;
use App\Models\FactOperatingSystem;
use App\Models\FactPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class AliasController extends Controller
{
    public function index()
    {
        $alias = Alias::orderBy('id', 'asc')
            ->get();

        return view('layout', ['alias' => $alias]);
    }

    public function updateAlias(Request $request)
    {
        $fact_id = $request->get('factPicker');
        $alias_id = $request->get('aliasId');

        $aliasUpdate = new Alias();
        $aliasUpdate->updateAlias($alias_id, 'fact_operating_system', $fact_id);

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

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $alias = new Alias();

        switch ($filter) {
            case 'os':
                $alias = $alias->getOSFact();
                break;
            case 'partner':
                $alias = $alias->getPartnerFact();
                break;
            default:
                $alias->get();
                break;
        }

        return view('layout', ['alias' => $alias]);
    }
}
