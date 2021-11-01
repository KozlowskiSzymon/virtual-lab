<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function onFilterChange(Request $request) {

        $itemsFiltered = array();
        $keywords = DB::table('keywords')->get();
        $keywords = json_decode($keywords, true);

        $items = Item::query()->with('keywords')->with('users')->get();
        $items = json_decode($items, true);
        if ($request -> filter != null && sizeof($request -> filter) > 0) {
            foreach ($items as $item) {
                if (!array_diff($request -> filter, array_column($item['keywords'], 'id'))) {
                    array_push($itemsFiltered, $item);
                }
            }
            $items = $itemsFiltered;
        }
        $oldFilter = $request -> filter ?: [];
        return view("dashboard", compact('items', 'keywords', 'oldFilter'));
    }

    public function borrowItem(Request $request) {
        $item = Item::query()->where('id', '=', $request->id)->first();
        if ($item['available'] > 0) {
            $available = $item['available'] - 1;
            $item->update(['available' => $available]);
            $item->users()->attach(Session::get('loginId'));
        }
        return back();
    }

    public function items() {
        $items = DB::table('items')->get();
        $items = json_decode($items, true);

        return view("items", compact('items'));
    }

    public function editItem(Request $request) {

    }

    public function removeItem(Request $request) {
        $item = Item::query()->where('id', '=', $request->id)->first();
        $item->users()->detach();
        $item->keywords()->detach();
        $item->delete();
        return $this->items();
    }

    public function addItem(Request $request) {
        $request->validate([
            'name'=>'required',
            'model'=>'required|unique:items',
            'quantity'=>'required',
        ]);
        $item = new Item();
        $item->name = $request->name;
        $item->model = $request->model;
        $item->description = $request->description;
        $item->image = $request->image;
        $item->url = $request->url;
        $item->quantity = $request->quantity;
        $res = $item->save();
        if ($res) {
            return back()->with('success', 'Item added.');
        } else {
            return back()->with('fail', 'Error occurred. Item has not been added.');
        }
    }
}
