<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RecipesiteController;
use Illuminate\Http\Request;
use App\Setting;


class HomeController extends RecipesiteController
{
    
    /**
     * ホーム
     */
    public function home()
    {
        $id = 1;
        $setting = Setting::find($id);
        return view('home', ['setting' => $setting]);
    }
}