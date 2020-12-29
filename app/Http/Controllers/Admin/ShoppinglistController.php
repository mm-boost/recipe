<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShoppingList;
use Log;
use App\Shop;
use App\ShoppingHistory;
use Carbon\Carbon;

class ShoppinglistController extends Controller
{
    public function add()
    {
        $shops = Shop::all();
        return view('shoppinglist/create',["shops" => $shops]);
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Shoppinglist::$rules);
        $form = $request->all();
        
        $shop = Shop::find($form['retailer']);
        //店舗名設定　もしショップモデルが空なら、購入先IDを取得してセーブする
        if (is_null($shop)){
            $shop =new Shop;
            $shop->name=$form['retailer'];
            $shop->save();
        }
        $shoppinglist = new ShoppingList;
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
        unset($form['retailer']);
        unset($form['shop']);

        //データベースに保存する
        $shoppinglist->fill($form);
        $shoppinglist->shop_id=$shop->id;
        $shoppinglist->save();

        return redirect('shoppinglist/index');
    }

    public function edit(Request $request)
    {
        $shoppinglist = Shoppinglist::find($request->id);
        Log::debug('ショッピングリスト取得結果', compact('shoppinglist'));
        
        if(empty($shoppinglist)) {

            Log::debug('リストが取得できなかった為「404」を返す');
            abort(404);
        }
        $shops = Shop::all();
        return view('shoppinglist/edit',["shops" => $shops,'shoppinglist_form' => $shoppinglist, 'favorite' => 0]);
    }

    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Shoppinglist::$rules);
        $form = $request->all();
        $shop = Shop::find($form['retailer']);
        //店舗名設定　もしショップモデルが空なら、購入先IDを取得してセーブする
        if (is_null($shop)){
            $shop =new Shop;
            $shop->name=$form['retailer'];
            $shop->save();
        }
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

        unset($shoppinglist_form['retailer']);
        unset($shoppinglist_form['shop']);
        unset($shoppinglist_form['image']);
        unset($shoppinglist_form['remove']);
        unset($shoppinglist_form['_token']);
        
        
        //該当するデータを上書きして保存する
        $shoppinglist->fill($shoppinglist_form);
        $shoppinglist->shop_id=$shop->id;
        $shoppinglist->save();
        
        $shoppinglist_history = new ShoppingHistory;
        $shoppinglist_history->shoppinglist_id = $shoppinglist->id;
        $shoppinglist_history->edited_at = Carbon::now();
        $shoppinglist_history->save();

        return redirect('shoppinglist/index');
    }

    public function index(Request $request)
    {
        $cond_shopname = $request->retailer;
        if ($cond_shopname !='') {
            $posts = Shoppinglist::where('shop_id',$cond_shopname)->get();
        } else {
            $posts = Shoppinglist::all();
        }

        /*$cond_favorite = $request->favorite;
        if ($cond_favorite !='') {
            $posts = Shoppinglist::where('favorite_id',$cond_favorite)->get();
        } else {
            $posts = Shoppinglist::all();}*/

        $shops = Shop::all();
        //'cond_shopname' => $cond_shopname検索設定
        return view('shoppinglist/index',["shops" => $shops,'posts' => $posts,'cond_shopname' => $cond_shopname,]);
    }
    
    public function delete(Request $request)
    {
        $shoppinglist = Shoppinglist::find($request->id);
        $shoppinglist->delete();
        return redirect('shoppinglist/index');
    }
    
}  
