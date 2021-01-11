<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required|string|max:10',
    );
    //テーブル名を間違えると、参照先が合わなくなりセーブやDBの取り出しができなるなるので注意
    //Column not found: 1054 Unknown column ‘◯◯’ in ‘field list’
    //「データベースフィールドに「◯◯」というカラムは見つかりませんよ」
    protected $table = 'shops'; 

}
