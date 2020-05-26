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

Auth::routes();

Route::get('/mi-cuenta', 'UserController@index')->name('my-account');

Route::get('/mi-cuenta/agregar-indio', 'UserController@create')->name('create-indian');

Route::post('/mi-cuenta/agregar-indio', 'UserController@store')->name('store-indian');

// Registration Routes...
Route::get('regitrar-cacique', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('regitrar-cacique', 'Auth\RegisterController@register');