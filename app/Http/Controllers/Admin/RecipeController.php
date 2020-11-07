<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Recipe;
use Log;

class RecipeController extends Controller
{
    public function form()
    {
        Log::debug('message');
        return view('/');
    }
 
    public function add()
    {
        //$recipes = Recipe::all();
        return view('recipe/create');
    }

    public function create(Request $request)
    {
        //validationを行う
        //$this->validate($request, Recipe::$rules);
        //$recipe = new Recipe;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        //データベースに保存する
        $recipe->fill($form);
        $recipe->save();
        
        return redirect('recipe/create');
    }
    public function edit(Request $request)
    {
        //$recipe = Recipe::find($request->id);
        Log::debug('設定取得結果', compact('recipe'));
        
        if(empty($recipe)) {
            abort(404);
        }
        return view('recipe/edit',['recipe_form' => $recipe]);
    }

    /*public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Recipe::$rules);
        $recipe = Recipe::find($request->id);
        //送信されてきたフォームデータを格納する
        $recipe_form = $request->all();
        unset($recipe_form['remove']);
        unset($recipe_form['_token']);
        
        //該当するデータを上書きして保存する
        $recipe->fill($recipe_form)->save();
        
        $recipe_history = new RecipeHistory;
        $recipe_history->recipe_id = $recipe->id;
        $recipe_history->edited_at = Carbon::now();
        $recipe_history->save();

        return redirect('recipe/edit');
    }
    public function delete(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->delete();
        return redirect('recipe');
    }
    public function index(Request $request)
    {
        $cond_menu = $request->$cond_menu;
        if ($cond_menu !='') {
            $posts = Recipe::where('title',$cond_menu)->get();
        } else {
            $posts = Recipe::all();
        }
        return index('recipe/index',['posts' => $posts,'cond_menu' => $cond_menu]);
    }*/
    

  }