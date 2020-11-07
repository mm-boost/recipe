<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Log;

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
        Log::debug('設定取得結果', compact('setting'));
        
        if(empty($setting)) {
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
        unset($setting_form['remove']);
        unset($setting_form['_token']);
        
        //該当するデータを上書きして保存する
        $setting->fill($setting_form)->save();
        
        $setting_history = new SettingHistory;
        $setting_history->setting_id = $setting->id;
        $setting_history->edited_at = Carbon::now();
        $setting_history->save();

        return redirect('setting/edit');
    }

    public function index(Request $request)
    {
        return view('setting',['posts' => $posts]);
    }
    
    public function delete(Request $request)
    {
        $setting = Setting::find($request->id);
        $setting->delete();
        return redirect('setting');
    }
}