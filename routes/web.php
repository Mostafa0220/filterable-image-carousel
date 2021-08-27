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
/*Route::get("/convert/{url}", function($url) {
    return $url;
})->where('url', '.*');*/
 Route::get('/convert/{csvUrl}', 'ConvertController@index')->where('csvUrl', '.*');
 Route::get('/items', 'ConvertController@items');

Route::resource('products','ProductController');

