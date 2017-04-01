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

//Route::when('*', 'csrf', ['post', 'put', 'delete']);

Route::get('/mail', 'MailController@html_email');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get("/test", function(){
	return view("master");
});

Route::resource("/products", "ProductsController");

