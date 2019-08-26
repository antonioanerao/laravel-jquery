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
Route::get('/create', 'ProdutosController@create')->name('create');
Route::get('/produtos', 'ProdutosController@index')->name('produtos');
Route::post('/store-produto', 'ProdutosController@storeProduto')->name('storeProduto');
Route::post('/store-posts', 'PostsController@storePosts')->name('storePosts');