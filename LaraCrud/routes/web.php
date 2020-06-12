<?php

use Illuminate\Support\Facades\Route;

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
    return view('main');
});

Auth::routes();

Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/create', 'ProductController@create')->name('create.product');

Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit.product');

Route::post('/update/product/{id}', 'ProductController@update')->name('update.product');

Route::post('/store', 'ProductController@store')->name('product.store');

Route::get('/home', 'HomeController@index')->name('home');
