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

        $items = array();

        if ($request -> filter != null && sizeof($request -> filter) > 0) {
            $items = Item::query()->where('keywords', '=', $request -> filter)->get();
        } else {
            $items = DB::table('items')->get();
        }
        $items = json_decode($items, true);
        return view("dashboard", compact('items'));

    }
}
