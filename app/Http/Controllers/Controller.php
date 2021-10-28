<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function borrowItem(Request $request) {
        return view("auth.register");
    }

    public function keywords(Request $request) {

        $keywords = array();
        $keywords = DB::table('keywords')->get();
        $keywords = json_decode($keywords, true);
        return view("keywords", compact('keywords'));
    }

    public function addKeyword(Request $request) {
        $request->validate([
            'name'=>'required'
        ]);
        $keyword = new Keyword();
        $keyword->name = $request->name;
        $res = $keyword->save();
        if ($res) {
            return back()->with('success', 'Keyword added.');
        } else {
            return back()->with('fail', 'Error occurred. Keyword has not been added.');
        }
    }

    public function profile() {
        return view("profile");
    }

    public function changePassword() {

    }

    public function items() {
        $items = array();
        $items = DB::table('items')->get();
        $items = json_decode($items, true);
        return view("items", compact('items'));
    }
}
