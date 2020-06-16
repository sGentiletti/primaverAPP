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
Auth::routes(['verify' => true]);
Route::get('registrar-cacique', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrar-cacique', 'Auth\RegisterController@register');

//USER ROUTES
Route::prefix('/perfil')->middleware('auth', 'verified')->group(function () {
    //perfil
    Route::get('/', 'UserController@obtenerDatos')->name('perfil');

    //Agregar Indio
    Route::get('/agregar', function(){
        return view('agregar');
    })->name('agregar');
    //Agregar indio (Action)
    Route::post('/', 'UserController@store')->name('agregarAction');

    //formulario para actualizar los datos del indio que se pasen por parametro
    Route::get('detalle/{id}', 'UserController@detalleIndio')->name('detalleIndio');
    //accion de actualizar indio. No tiene vista, solo llama a la funcion.
    Route::post('detalle/{id}', 'UserController@actualizarIndio')->name('detalleAction');

    //Acción de eliminar un indio.
    Route::get('detalle/eliminar/{id}', 'UserController@eliminarIndio')->name('eliminarIndioAction');

    //Accion de confirmar tribu como Cacique
    Route::get('confirmar', 'TribuController@store')->name('confirmarAction');
});


//ADMIN ROUTES
Route::prefix('adminpanel')->middleware(['auth', 'admin'])->group(function () {
    //Vista del panel de Administracion
    Route::get('/', 'UserController@mostrarListadoCaciques')->name('adminPanel');

    //Ver info de la Tribu del Cacique seleccionado
    Route::get('tribu/{id}', 'UserController@mostrarListadoTribus')->name('listadoTribus');

    //Buscar persona por dni
    Route::get('persona/{dni}', 'UserController@buscarPersonaPorDni')->name('buscarPersonaPorDni');

    //Actualizar persona por DNI
    Route::post('persona/{id}', 'UserController@actualizarDni')->name('actualizarDni');

    //Registrar persona
    Route::get('registrar', function () {
        return view('adm/registrarCacique');
    })->name('registrarCaciqueForm');
    Route::post('registrar/store', 'UserController@registrarCacique')->name('registrarCacique');
});









