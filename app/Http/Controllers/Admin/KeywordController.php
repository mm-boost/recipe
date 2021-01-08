<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe;
use Log;
use App\Keyword;

class KeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::all();   // Eloquent"keyword"で全データ取得
        
        return view('recipe.keyword',["keywords" => $keywords]);
    }

    public function list($id) //ルートで設定したidを取得
    {
        //dd($id);
        //キーワードのidと一致するレシピテーブルのkeyword_idデータを全て取得
        $recipes = Recipe::where('keyword_id', $id)->get();

        return view('recipe.keyword.list',["recipes" => $recipes,'id' => $id]);    
    }
}
