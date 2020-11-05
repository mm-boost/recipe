<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingRetailer extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'shoppinglist_id' => 'required',
        'edited_at' => 'required',
    );
    // 参照させたいSQLのテーブル名を指定してあげる
    protected $table = 'shoppinglist_retailers';
}
