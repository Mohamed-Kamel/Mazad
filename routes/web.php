<?php

Route::get('/', function () {
    return view('welcome');
});

Route::delete('/delete/{id}',"ProductController@delete");
Route::get('/myitem',"ProductController@display");


Route::get('/editprof/{id}',"HomeController@update");
Route::post('/editprof/{id}',"HomeController@donee");


Auth::routes();
Route::get('/home', 'HomeController@index');
