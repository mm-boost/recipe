<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    //Validation設定を行う　必須項目設定
    public static $rules = array(
        'menu' => 'required|string|max:20',
        'people' => 'required|integer|max:5',
        'howto' => 'nullable|string|max:600',
        'image_path' => 'nullable|image|file|max:2048',
    );

    //$fillableで複数代入指定　更新しても良い項目を指定する
    protected $fillable = ['category','tool','keyword','menu','people','foodname','foodnum','unit','howto','image_path'];
    
    protected $guarded = array('id');

    //１対１のリレーション
    public function categores()
    {
      return $this->hasOne('App\Category');
    }
    public function tools()
    {
      return $this->hasOne('App\Tool');
    }
    public function keywords()
    {
      return $this->hasOne('App\Keyword');
    }
    //  1 対 多 の1側
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