<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'foodname' => 'required',
        'foodnum' => 'required',
        'unit' => 'required',
    );
    protected $table = 'foods';
}
