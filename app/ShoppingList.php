<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    //Validation設定を行う　必須項目設定
    public static $rules = array(
        'retailer' => 'required|string|max:15',
        'productname' => 'required|string|max:15',
        'amount' => 'nullable|required_with:num|integer|digits_between:1,6',
        'num' => 'nullable|required_with:amount',
        'amounttotal' => 'nullable|integer|digits_between:1,7',
        'genre' => 'nullable',
        'memo' => 'nullable|string|max:100'
    );

    //$fillableで複数代入指定　更新しても良い項目を指定する
    protected $fillable = ['retailer','shopname','productname','amount','num','amounttotal','genre','memo'];
    
    protected $guarded = array('id');

    //１対１のリレーション
    public function shops()
    {
        return $this->hasOne('App\Shop');
    }
}