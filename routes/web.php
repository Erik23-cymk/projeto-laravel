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
    return view('index');
});

//Rest clients
Route::get('/clients', 'ClientController@index')->name('clients');
Route::get('/clients/create', 'ClientController@create')->name('clients_create');
Route::post('/clients/store', 'ClientController@store')->name('clients_store');
Route::get('/clients/{client}', 'ClientController@edit')->name('clients_edit');
Route::put('/clients/{client}', 'ClientController@update')->name('clients_update') ;
Route::delete('/clients/{client}', 'ClientController@destroy')->name('clients_destroy');

//Rest products
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/create', 'ProductController@create')->name('products_create');
Route::post('/products/store', 'ProductController@store')->name('products_store');
Route::get('/products/{product}', 'ProductController@edit')->name('products_edit');
Route::put('/products/{product}', 'ProductController@update')->name('products_update') ;
Route::delete('/products/{product}', 'ProductController@destroy')->name('products_destroy');

//Rest sells
Route::get('/sells', 'SellController@index')->name('sells');
Route::get('/sells/create', 'SellController@create')->name('sells_create');
Route::post('/sells/store', 'SellController@store')->name('sells_store');
Route::get('/sells/{sell}/products', 'SellController@products')->name('sell_products');
Route::post('/sells/{sell}/products', 'SellController@product_store')->name('sells_product_store');
Route::delete('/sells/{sell}/{productItem}/products', 'SellController@product_destroy')->name('sells_product_destroy');
Route::get('/sells/{sell}', 'SellController@edit')->name('sells_edit');
Route::put('/sells/{sell}', 'SellController@update')->name('sells_update');
Route::put('/sells/{sell}/finish', 'SellController@finish')->name('sells_finish');