<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function add()
    {
        return view('setting/create');
    }

    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Setting::$rules);
        $setting = new Setting;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //データベースに保存する
        $setting->fill($form);
        $setting->save();
        
        return redirect('setting/create');
    }

    public function edit(Request $request)
    {
        $setting = Setting::find($request->id);
        if(empty($profile)) {
            abort(404);
        }
        return view('setting/edit',['setting_form' => $setting]);
    }

    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Setting::$rules);
        // Setting Modelからデータを受け取る
        $setting = Setting::find($request->id);
        //送信されてきたフォームデータを格納する
        $setting_form = $request->all();
        unset($setting_form['_token']);
        
        //該当するデータを上書きして保存する
        $setting->fill($setting_form)->save();
        
        $setting_history = new SettingHistory;
        $setting_history->profile_id = $profile->id;
        $setting_history->edited_at = Carbon::now();
        $setting_history->save();

        return redirect('setting/edit');
    }
     
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title !='') {
            $posts = Profile::where('title',$cond_title)->get();
        } else {
            $posts = Profile::all();
        }
        return view('admin.profile.index',['posts' => $posts,'cond_title' => $cond_title]);
    }
    
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        $profile->delete();
        return redirect('admin/profile/');
    }
}