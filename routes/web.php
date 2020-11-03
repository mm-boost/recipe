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

Route::get('/recipelist', 'Admin\RecipeController@form');
Route::post('/recipelist', 'Admin\RecipeController@add');

Route::group(['prefix' => 'setting'], function() {
    Route::get('/create', 'Admin\SettingController@add');
    Route::post('/create','Admin\SettingController@create');
    Route::get('/edit', 'Admin\SettingController@edit');
    Route::post('/edit', 'Admin\SettingController@update');
});

Route::group(['prefix' => 'shoppinglist'], function() {
    Route::get('/create', 'Admin\ShoppinglistController@add');
    Route::post('/create','Admin\ShoppinglistController@create');
    Route::get('/edit', 'Admin\ShoppinglistController@edit');
    Route::post('/edit', 'Admin\ShoppinglistController@update');
});