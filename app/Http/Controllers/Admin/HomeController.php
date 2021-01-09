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
        if (empty($setting)) {    //プロフィールが未設定の場合はリダイレクト
            return redirect('setting/create');        
        } 
        return view('home', ['setting' => $setting]);
    }
}