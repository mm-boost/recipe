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
    Route::get('/create', 'Admin\RecipeController@add')->name('recipe.create');
    Route::post('/create','Admin\RecipeController@create');
    Route::get('/edit', 'Admin\RecipeController@edit');
    Route::post('/edit', 'Admin\RecipeController@update');
    Route::get('/index', 'Admin\RecipeController@index');
    Route::post('/edit', 'Admin\RecipeController@update');
    Route::get('/category', 'Admin\CategoriesController@index');
    Route::get('/tool', 'Admin\ToolController@index');
    Route::get('/keyword', 'Admin\KeywordController@index');
});
Route::group(['prefix' => 'recipe'], function($id) {
    Route::get('/category/list/{id}', 'Admin\CategoriesController@list')->name('recipe.category.list');
    Route::get('/tool/list/{id}', 'Admin\ToolController@list')->name('recipe.tool.list');
    Route::get('/keyword/list/{id}', 'Admin\KeywordController@list')->name('recipe.keyword.list');
    Route::get('/delete/{id}', 'Admin\RecipeController@delete');
    Route::get('/edit/{id}', 'Admin\RecipeController@edit')->name('recipe.edit');
    Route::get('/show/{id}', 'Admin\RecipeController@show')->name('recipe.show');
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
    Route::get('/edit', 'Admin\SettingController@edit')->name('setting.edit');
    Route::post('/edit', 'Admin\SettingController@update');
    Route::get('/show', 'Admin\SettingController@show');
});
