<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShoppingList;
use Log;
use App\Shop;
use Illuminate\Support\Facades\DB;

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
try {
         // DB transaction 始める
        DB::beginTransaction();

        $shoppinglist = new ShoppingList;
        $form = $request->all();
        //shopモデル内のフォーム送信された'retailer'(店舗名)を取り出す
        $shop = Shop::find($form['retailer']);
        //店舗名設定　もしショップモデルが空なら、購入先IDを取得してセーブする
        if (is_null($shop)){
            $shop =new Shop;
            $shop->name=$form['retailer'];
            $shop->save();
        }
        //dd($form); 

        //フォームから送信されてきた不必要なデータ（_token,imageなど）を削除する
        //リレーション時には、主モデルに余計なデータが保存されないように、削除指定をする        
        unset($form['_token']);
        unset($form['retailer']);
        unset($form['shop']);

        //データベースに保存する
        $shoppinglist->fill($form);
        $shoppinglist->shop_id=$shop->id;
        $shoppinglist->save();

        // db commit　データベースの更新内容を確定。
        DB::commit(); 

        return redirect('shoppinglist/index');

    } catch (Exception $e) {
        // db rollback　エラーが発生したら処理を取り消し。
        DB::rollBack();
        //echo '捕捉した例外: ',  $e->getMessage(), "\n";
        Log::error($e->getMessage());
        //入力内容を保持したまま前の画面に戻る
        return redirect()->back()->withInput($request->all); 
    }
    }

    public function edit(Request $request)
    {
        // Shoppinglist Modelからデータを受け取る
        $shoppinglist = Shoppinglist::find($request->id);
        //Log::debug('ショッピングリスト取得結果', compact('shoppinglist'));
        
        //emptyは変数の中身を確認する関数
        //もし$shoppinglistが空ならエラーを返す
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

 try {
        DB::beginTransaction();
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
        //$shoppinglist_formにリクエストデータ全てを格納する
        $shoppinglist_form = $request->all();

        //不必要なデータを削除
        unset($shoppinglist_form['retailer']);
        unset($shoppinglist_form['shop']);
        unset($shoppinglist_form['remove']);
        unset($shoppinglist_form['_token']);
        
        //該当するデータを上書きして保存する
        $shoppinglist->fill($shoppinglist_form);
        $shoppinglist->shop_id=$shop->id;
        $shoppinglist->save();
        
        DB::commit(); 

        return redirect('shoppinglist/index');

    } catch (Exception $e) {
        DB::rollBack();
        //echo '捕捉した例外: ',  $e->getMessage(), "\n";
        Log::error($e->getMessage());
        //入力内容を保持したまま前の画面に戻る
        return redirect()->back()->withInput($request->all); 
    }
    }

    public function index(Request $request)
    {
        $cond_shopname = $request->retailer;
        if ($cond_shopname !='') {
            $posts = Shoppinglist::where('shop_id',$cond_shopname)->get();
        } else {
            $posts = Shoppinglist::all();
        }

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
