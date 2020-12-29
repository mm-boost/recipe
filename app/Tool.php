<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'tool' => 'required',
    );
    protected $table = 'tools';
}
