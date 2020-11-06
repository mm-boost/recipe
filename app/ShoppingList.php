<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    //Validation設定を行う　必須項目設定
    public static $rules = array(
        'retailer' => 'required',
        'productname' => 'required',
    );

    //$fillableで複数代入指定　更新しても良い項目を指定する
    protected $fillable = ['retailer','productname','amount','num','amounttotal','genre','favorite','image_path','memo'];
    
    protected $guarded = array('id');

    // Shoppinglistモデルと関連モデルの紐付けを行う
    public function histories()
    {
        return $this->hasMany('App\SoppingHistory');
    }
}