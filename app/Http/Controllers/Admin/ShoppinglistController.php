<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShoppingList;
use Log;

class ShoppinglistController extends Controller
{
    public function add()
    {
        return view('shoppinglist/create');
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Shoppinglist::$rules);
        $shoppinglist = new ShoppingList;
        $form = $request->all();
        //＄関数名内のデータを確認
        //dd($form); 

        
        // フォームから画像が送信されてきたら、保存して、$shoppinglist->image_path に画像のパスを保存する
        if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $shoppinglist->image_path = basename($path);
        } else {
          $shoppinglist->image_path = null;
       }
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        //データベースに保存する
        $shoppinglist->fill($form);
        $shoppinglist->save();

        return redirect('shoppinglist/create');
    }

    public function edit(Request $request)
    {
        $shoppinglist = Shoppinglist::find($request->id);
        Log::debug('ショッピングリスト取得結果', compact('shoppinglist'));
        
        if(empty($shoppinglist)) {

            Log::debug('リストが取得できなかった為「404」を返す');
            abort(404);
        }
        return view('shoppinglist/edit',['shoppinglist_form' => $shoppinglist]);
    }

    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Shoppinglist::$rules);
        // Shoppinglist Modelからデータを受け取る
        $shoppinglist = Shoppinglist::find($request->id);
        //送信されてきたフォームデータを格納する
        $shoppinglist_form = $request->all();
        if ($request->remove == 'true') {
            $shoppinglist_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $shoppinglist_form['image_path'] = basename($path);
        } else {
            $shoppinglist_form['image_path'] = $shoppinglist->image_path;
        }

        unset($shoppinglist_form['image']);
        unset($shoppinglist_form['remove']);
        unset($shoppinglist_form['_token']);
        
        //該当するデータを上書きして保存する
        $shoppinglist->fill($shoppinglist_form)->save();
        
        $shoppinglist_history = new ShoppinglistHistory;
        $shoppinglist_history->shoppinglist_id = $shoppinglist->id;
        $shoppinglist_history->edited_at = Carbon::now();
        $shoppinglist_history->save();

        return redirect('shoppinglist/edit');
    }

    public function index(Request $request)
    {
        $cond_productname = $request->cond_productname;
        if ($cond_productname !='') {
            $posts = Shoppinglist::where('title',$cond_productname)->get();
        } else {
            $posts = Shoppinglist::all();
        }
        return view('shoppinglist/index',['posts' => $posts,'cond_productname' => $cond_productname]);
    }
    
    public function delete(Request $request)
    {
        $shoppinglist = Shoppinglist::find($request->id);
        $shoppinglist->delete();
        return redirect('shoppinglist/index');
    }
    
}  
