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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('goods/create', 'GoodsController@create');
Route::post('goods/create', 'GoodsController@postCreate');
Route::get('goods', 'GoodsController@index');
Route::delete('goods/delete/{id}', 'GoodsController@delete');
Route::get('goods/update/{id}', 'GoodsController@update');
Route::put('goods/update/{id}', 'GoodsController@postUpdate');

