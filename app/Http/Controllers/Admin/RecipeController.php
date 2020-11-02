<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;
class RecipeController extends Controller
{
    public function form()
    {
        Log::debug('message');
        return view('recipelist');
    }
    public function add()
    {
        dd("開発中"); //ddは強制終了のコマンド→開発中の文字が表示
        //return view('recipelist');
    }
  }