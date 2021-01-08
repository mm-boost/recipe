<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'keyword' => 'required',
    );
    protected $table = 'keywords';
    public function recipes()
    {
      // Recipeモデルのデータを引っ張てくる
      return $this->belongsTo('App\Recipe');
    }
  
}
