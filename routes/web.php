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




Route::delete('/delete/{id}',"ProductController@delete");
Route::get('/myitem',"ProductController@display");

Route::get('/', 'ProductController@index');
Route::get('/search', 'ProductController@search');

Route::get('/editprof/{id}',"HomeController@update");
Route::post('/editprof/{id}',"HomeController@donee");


Auth::routes();


Route::get('/item/{id}', 'ProductController@showDetails');

Route::post('/item/{id}', 'ProductController@updateBid');

Route::get('/item/{id}/edit', 'ProductController@showEdit');

Route::post('/item/{id}/edit', 'ProductController@editProduct');

Route::group(["middleware" => "auth"], function(){

    Route::resource("/products", "ProductController");

});