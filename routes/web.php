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

Route::get('/perfil', 'UserController@index')->name('perfil')->middleware("auth");
//mostrar indios del cacique
Route::get('/perfil', 'UserController@verIndios')->name('perfil')->middleware("auth");

Route::get('/perfil/agregar', 'UserController@showForm')->name('agregar')->middleware("auth");

Route::post('/perfil', 'UserController@store')->name('agregarAction')->middleware("auth");


// Registration Routes...
Route::get('registrar-cacique', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrar-cacique', 'Auth\RegisterController@register');
