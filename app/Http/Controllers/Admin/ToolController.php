<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\Tool;
use Log;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::all();   // Eloquent"tool"で全データ取得

        return view('recipe/tool',["tools" => $tools]);
    }

    public function list($id) //ルートで設定したidを取得
    {
        //dd($id);
        //toolのidと一致するレシピテーブルのtool_idのデータを全て取得
        $recipes = Recipe::where('tool_id', $id)->get();

        return view('recipe.tool.list',["recipes" => $recipes,'id' => $id]);    
    }
}
