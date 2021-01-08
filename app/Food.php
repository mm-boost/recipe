<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'foodname.*' => 'string|max:20',
        'foodnum.*' => 'max:10',
        'unit.*' => 'required_if:foodname',
        );
    protected $table = 'foods';

    // 1 対 多 の多側
    //hasMany(1)の逆を定義するには、子のモデルでbelongsToメソッドによりリレーション関数を定義
    public function recipes()
    {
    return $this->belongsTo('App\Recipe');
    }
}
