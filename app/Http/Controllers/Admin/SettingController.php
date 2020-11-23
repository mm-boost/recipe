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

    public function create()
    {
        return redirect('setting/create');
    }

    public function edit()
    {
        return view('setting/edit');
    }

    public function update()
    {
        return redirect('setting/edit');
    }
}
