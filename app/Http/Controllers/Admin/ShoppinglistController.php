<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppinglistController extends Controller
{
    public function add()
    {
        return view('shoppinglist/create');
    }

    public function create()
    {
        return redirect('shoppinglist/create');
    }

    public function edit()
    {
        return view('shoppinglist/edit');
    }

    public function update()
    {
        return redirect('shoppinglist/edit');
    }

  }