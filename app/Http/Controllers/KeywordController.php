<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeywordController extends Controller
{
    public function keywords(Request $request) {

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
    public function removeKeyword(Request $request) {

    }
}
