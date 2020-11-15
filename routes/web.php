<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'Admin\HomeController@home');


Route::group(['prefix' => 'admin'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('recipe/create', 'Admin\RecipeController@form');
    Route::post('recipe/create', 'Admin\RecipeController@add');
});
