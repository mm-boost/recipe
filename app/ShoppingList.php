<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    //Validation設定を行う　必須項目設定
    public static $rules = array(
        'productname' => 'required',
        'genre' => 'required',
        
    );
    protected $fillable = ['productname','amount','num','amounttotal','genre','retailer','favorite','image_path','memo']; //更新しても良い項目を指定する
    

    // Shoppinglistモデルとshoppinghistoryとの関連付けを行う
    public function histories()
    {
        return $this->hasMany('App\SoppingHistory');
    }
}