<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe;
use Log;
use App\Tool;
use Carbon\Carbon;
use Exception;

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
        //編集、削除のためのid取得
        //$posts = Recipe::select('id')->get();

        return view('recipe.tool.list',["recipes" => $recipes,'id' => $id]);    
    }
}
