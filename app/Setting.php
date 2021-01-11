<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //以下、名前(nickname)、性別(gender)、年齢(age)、目標(aim)のValidation設定を行う
    public static $rules = array(
        'nickname' => 'required|string|max:10',
        'gender' => 'required',
        'age' => 'required',
        'aim' => 'required',
    );
    protected $fillable = ['nickname','gender','age','aim']; //更新しても良い項目を指定する
    
    public function setting_histories()
    {
        return $this->hasMany('App\SettingHistory');
    }
}
