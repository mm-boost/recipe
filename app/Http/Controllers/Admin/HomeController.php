<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;


class HomeController extends RecipeController
{
    
    /**
     * ホーム
     */
    public function home()
    {
        return view('home', [
            'userInfo' => $this->getUserInfo()
        ]);
    }
    
    // 以下を追記
    public function add()
    {
        return view('home');
    }
}
