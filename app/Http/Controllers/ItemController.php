<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function onFilterChange(Request $request) {

        $itemsFiltered = array();
        $keywords = DB::table('keywords')->get();
        $keywords = json_decode($keywords, true);

        $items = Item::query()->with('keywords')->get();
        $items = json_decode($items, true);
        if ($request -> filter != null && sizeof($request -> filter) > 0) {
            foreach ($items as $item) {
                if (!array_diff($request -> filter, array_column($item['keywords'], 'id'))) {
                    array_push($itemsFiltered, $item);
                }
            }
            $items = $itemsFiltered;
        }

        return view("dashboard", compact('items', 'keywords'));
    }

    public function borrowItem(Request $request) {
        return view("auth.register");
    }

    public function items() {
        $items = DB::table('items')->get();
        $items = json_decode($items, true);

        return view("items", compact('items'));
    }

    public function editItem(Request $request) {

    }

    function test_sth($val, $request) {
        return ;
    }
}
