<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
class ShoppinglistController extends Controller
{
    public function add()
    {
        Log::debug('message');
        return view('shoppinglist');
    }
  }