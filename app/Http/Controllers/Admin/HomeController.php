<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 以下を追記
  public function add()
  {
    return view('admin.home.create');
  }
}
