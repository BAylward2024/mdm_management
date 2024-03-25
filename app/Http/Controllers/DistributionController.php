<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DistributionController extends Controller
{
    public function view()
    {
        $distributions = DB::table('mdm.dim_distribution')->paginate(15);

        return view('layout', ['distributions' => $distributions]);
    }

    public function filter(Request $request)
    {
        $distName = $request->input('dist-name');

        $distributions = DB::table('mdm.dim_distribution')->where('distribution_name', 'ILIKE', '%' . $distName . '%')->get();

        return view('layout', ['distributions' => $distributions]);
    }

    public function addDist(Request $request): RedirectResponse
    {
        $distName = $request->input('dist-name-in');

        // $distributions = DB::table('mdm.distribution')->where('distribution_name', 'ILIKE', '%' . $distName . '%')->get();

        DB::table('mdm.dim_distribution')->insert(
            ['distribution_name' => $distName]
        );

        return redirect('distributions');
    }

    public function editDist(Request $request): RedirectResponse
    {
        $distId = $request->input('dist-id');
        $distName = $request->input('dist-name-edit');

        DB::table('mdm.dim_distribution')
            ->where('id', '=', $distId)
            ->update(['distribution_name' => $distName]);

        return redirect('distributions');
    }

    public function deleteDist(Request $request): RedirectResponse
    {
        $distId = $request->input('dist-id');

        DB::table('mdm.dim_distribution')->where('id', '=', $distId)->delete();

        return redirect('distributions');
    }
}
