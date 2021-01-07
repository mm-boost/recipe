<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'foodname.*' => 'string|max:20',
        'foodnum.*' => 'required_if:foodname|max:10',
        'unit.*' => 'required_if:foodname',
        );
    protected $table = 'foods';
}
