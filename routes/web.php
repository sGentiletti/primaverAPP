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
Route::get('/perfil', 'UserController@obtenerDatos')->name('perfil')->middleware("auth");

Route::get('/perfil/agregar', 'UserController@showForm')->name('agregar')->middleware("auth");

Route::post('/perfil', 'UserController@store')->name('agregarAction')->middleware("auth");
//formulario para actualizar los datos del indio que se pasen por parametro
Route::get('/perfil/detalle/{id}', 'UserController@detalleIndio')->name('detalleIndio')->middleware("auth");
//accion de actualizar indio. No tiene vista, solo llama a la funcion.
Route::post('/perfil/detalle/actualizar/{id}', 'UserController@actualizarIndio')->name('detalleAction')->middleware("auth");
//Acción de eliminar un indio.
Route::get('/perfil/detalle/eliminar/{id}', 'UserController@eliminarIndio')->name('eliminarIndioAction')->middleware("auth");
//Accion de confirmar tribu como Cacique
Route::get('/perfil/confirmar', 'TribuController@store')->name('confirmarAction')->middleware("auth");

//ADMINISTRADOR
//Vista del panel de Administracion
Route::get('/adminpanel', function () {return view('adm/panel');})->name('adminPanel')->middleware("auth"); //Se definio aca la funcion para devolver la vista para no ponerla en el controlador de Usuario.
//Listado de tribus para Admin
Route::get('/adminpanel', 'UserController@mostrarListadoCaciques')->name('listadoCaciques')->middleware("auth");
//Ver info de la Tribu del Cacique seleccionado
Route::get('adminpanel/tribu/{id}', 'UserController@mostrarListadoTribus')->name('listadoTribus')->middleware("auth");
//Buscar persona por dni
Route::get('/adminpanel/persona/{dni}', 'UserController@buscarPersonaPorDni')->name('buscarPersonaPorDni')->middleware("auth");
//Actualizar persona por DNI
Route::post('/adminpanel/persona/updateAction', 'UserController@actualizarDni')->name('actualizarDni')->middleware("auth");

//Registrar persona
Route::post('/adminpanel/registrar/store', 'UserController@registrarCacique')->name('registrarCacique')->middleware("auth");
Route::get('/adminpanel/registrar', function () {return view('adm/registrarCacique');})->name('registrarCaciqueForm')->middleware("auth");


// Registration Routes...
Route::get('registrar-cacique', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrar-cacique', 'Auth\RegisterController@register');
