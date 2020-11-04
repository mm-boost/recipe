<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppinglist extends Model
{
    //Validation設定を行う
    public static $rules = array(
        'productname' => 'required',
        'amount' => 'required',
        'num' => 'required',
        'amounttotal' => 'required',
        'genre' => 'required',
        'retailer' => 'required',
        'favorite' => 'required',
        'image_path' => 'required',
        'memo' => 'required',
    );
    protected $fillable = ['productname','amount','num','amounttotal','genre','retailer','favorite','image_path','memo']; //更新しても良い項目を指定する
    
    public function shoppinglist_histories()
    {
        return $this->hasMany('App\SoppinglistHistory');
    }
}
