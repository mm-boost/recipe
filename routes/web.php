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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/home', 'Admin\HomeController@home');

//レシピ
Route::group(['prefix' => 'recipe'], function() {
    Route::get('/create', 'Admin\RecipeController@add');
    Route::post('/create','Admin\RecipeController@create');
    Route::get('/edit', 'Admin\RecipeController@edit');
    Route::post('/edit', 'Admin\RecipeController@update');
    Route::get('/delete', 'Admin\RecipeController@delete');
    Route::get('/display', 'Admin\RecipeController@display');
    Route::get('/index', 'Admin\RecipeController@index');
    Route::get('/category', 'Admin\RecipeController@category');
    Route::get('/tool', 'Admin\RecipeController@tool');
    Route::get('/keyword', 'Admin\RecipeController@keyword');
    Route::get('/category/category1', 'Admin\RecipeController@category1');
});

//買い物メモ
Route::group(['prefix' => 'shoppinglist'], function() {
    Route::get('/create', 'Admin\ShoppinglistController@add');
    Route::post('/create','Admin\ShoppinglistController@create');
    Route::get('/edit', 'Admin\ShoppinglistController@edit');
    Route::post('/edit', 'Admin\ShoppinglistController@update');
    Route::get('/delete', 'Admin\ShoppinglistController@delete');
    Route::get('/index', 'Admin\ShoppinglistController@index');
});

//設定
Route::group(['prefix' => 'setting'], function() {
    Route::get('/create', 'Admin\SettingController@add');
    Route::post('/create','Admin\SettingController@create');
    Route::get('/edit', 'Admin\SettingController@edit');
    Route::post('/edit', 'Admin\SettingController@update');
    Route::get('/', 'Admin\SettingController@index');
});
