<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Recipe;
use Log;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();   // Eloquent"category"で全データ取得

        return view('recipe.category',["categories" => $categories]);
      }

    public function list($id) //ルートで設定したidを取得
    {
        //dd($id);
        //カテゴリーのidと一致するレシピテーブルのcategory_idデータを全て取得
        $recipes = Recipe::where('category_id', $id)->get();

        return view('recipe.category.list',["recipes" => $recipes,'id' => $id]);    
    }
}
