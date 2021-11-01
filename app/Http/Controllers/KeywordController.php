<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeywordController extends Controller
{
    public function keywords() {

        $keywords = DB::table('keywords')->get();
        $keywords = json_decode($keywords, true);
        $toEdit = null;
        return view("keywords", compact('keywords', 'toEdit'));
    }

    public function saveKeyword(Request $request) {
        $request->validate([
            'name'=>'required'
        ]);
        $toEdit = null;
        if ($request -> id) {
            $keyword = Keyword::query()->where('id', '=', $request -> id)->first();
            $res = $keyword->update(['name' => $request -> name]);
            $keywords = DB::table('keywords')->get();
            $keywords = json_decode($keywords, true);
            if ($res) {
                return view("keywords", compact('toEdit','keywords'))->with('success', 'Keyword updated.');
            } else {
                return view("keywords", compact('toEdit','keywords'))->with('fail', 'Error occurred. Keyword has not been updated.');
            }
        } else {
            $keyword = new Keyword();
            $keyword->name = $request->name;
            $res = $keyword->save();
            $keywords = DB::table('keywords')->get();
            $keywords = json_decode($keywords, true);
            if ($res) {
                return view("keywords", compact('toEdit','keywords'))->with('success', 'Keyword added.');
            } else {
                return view("keywords", compact('toEdit','keywords'))->with('fail', 'Error occurred. Keyword has not been added.');
            }
        }

    }

    public function removeKeyword(Request $request) {
        $keyword = Keyword::query()->where('id', '=', $request->id)->first();
        $keyword->items()->detach();
        $keyword->delete();
        return $this->keywords();
    }

    public function editKeyword(Request $request) {
        $keywords = DB::table('keywords')->get();
        $keywords = json_decode($keywords, true);
        $toEdit = Keyword::query()->where('id', '=', $request -> id)->first();
        return view("keywords", compact('toEdit', 'keywords'));
    }
}
