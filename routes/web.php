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
    return view('welcome');
});



// Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/products/show/{id}', 'ProductController@show')->name('products.show');

Route::get('/currency', 'ProductController@currency')->name('products.currency');

Route::get('/lagos_weather', 'ProductController@weather')->name('products.weather');

Route::get('/crypto', 'ProductController@crypto')->name('products.crypto');

Route::get('/run', 'ProductController@sch')->name('products.sch');

Route::get('/testcron', 'ProductController@test_cron')->name('products.test_cron');