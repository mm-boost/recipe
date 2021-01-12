<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RecipesiteController;
use App\Http\Controllers\Controller;
use App\Setting;


class HomeController extends Controller
{
    
    /**
     * ホーム
     */
    public function home()
    {
        $id = 1;
        $setting = Setting::find($id);
        if (empty($setting)) {    //プロフィールが未設定の場合はリダイレクト
            return redirect('setting/create');        
        } 
        return view('welcome', ['setting' => $setting]);
    }
}