<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function onFilterChange(Request $request) {

        $data = array();

        if ($request -> filter != null) {
            if (sizeof($request -> filter) > 0) {
                $data = Item::query()->where('keywords', 'in', $request -> filter)->get();
                echo $data;
            } else {
                $data = DB::table('items')->get();
                echo sizeof($data);
            }
        }
        return view("dashboard", compact('data'));

    }
}
