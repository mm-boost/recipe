<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe;
use Log;
use App\Tool;
use App\Food;
use App\RecipeHistory;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

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
        $posts = Recipe::all();
        //調理方法の値を実際に取得しビューに渡す処理を記述する．
        //$tool = Tool::where('id', $id)->first();

        /*$categories = DB::table('categories')
                ->whereColumn('updated_id', '=', 'created_id')
                ->get();
        $keywords = DB::table('keywords')
                ->whereColumn('updated_id', '=', 'created_id')
                ->get();
        $posts = Recipe::where('id', '1')->where('menu', '')
                ->first();*/

        return view('recipe.tool.list',['posts' => $posts,'id' => $id]);    
    }
}
