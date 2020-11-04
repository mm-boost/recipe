<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppinglist extends Model
{
    //
    public static $rules = array(
        'productname' => 'required',
        'amount' => 'required',
        'num' => 'required',
        'amounttotal' => 'required',
        'genre' => 'required',
        'retailer' => 'required',
        'favorite' => 'required',
        'image_path' => 'required',
        'memo' => 'required',
    );
}
