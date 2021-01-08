<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    //Validation設定を行う　必須項目設定
    public static $rules = array(
        'menu' => 'required|string|max:20',
        'howto' => 'max:300',
    );

    //$fillableで複数代入指定　更新しても良い項目を指定する
    protected $fillable = ['category','tool','keyword','menu','foodname','foodnum','unit','howto','image_path'];
    
    protected $guarded = array('id');

    // Historyモデルと関連モデルの紐付けを行う
    public function histories()
    {
        return $this->hasMany('App\RecipeHistory');
    }
    //  1 対 多 の１側
    public function foods()
    {
        return $this->hasMany('App\Food');
    }
    //レシピが削除されれば、関連モデルのFoodも連動して削除される
    //boot()メソッドはレコードの登録や削除の際にコールされるイベントリスナ
    public static function boot()
  {
    parent::boot();
    static::deleting(function($recipes) {
      $foods = $recipes->food()->get();
      foreach ($foods as $food) {
        $food->delete();
        }
    });
    }
}