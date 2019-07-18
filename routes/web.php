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
Route::get('/alumnos/', 'ControladoresController@index')->name('recibir');
Route::post('/alumnos/', 'ControladoresController@buscador')->name('buscador');
Route::get('/alumnos/detalleAlumno/{matricula?}', 'ControladoresController@detalleAlumno')->name('upload');

Route::post('/alumnos/a', 'ControladoresController@actualizar')->name('actualizar');
Route::post('/alumnos/store/{matricula?}','ControladoresController@store')->name('upload.file');
Route::post('/alumnos/store2/{matricula?}','ControladoresController@store2')->name('upload.file2');
Route::post('/alumnos/store3/{matricula?}','ControladoresController@store3')->name('upload.file3');

//Route::get('/descarga/{name?}/{matricula?}', 'Controladores@descarga')->name('descarga');
Route::get('/alumnos/descarga/{name?}/{matricula?}', 'ControladoresController@descarga');
Route::get('/alumnos/descarga2/{name?}/{matricula?}', 'ControladoresController@descarga2');
Route::get('/alumnos/descarga3/{name?}/{matricula?}', 'ControladoresController@descarga3');

Route::get('/alumnos/delete/{name?}/{matricula?}', 'ControladoresController@deletefiles')->name('elimina');
Route::get('/alumnos/delete2/{name?}/{matricula?}', 'ControladoresController@deletefiles2')->name('elimina2');
Route::get('/alumnos/delete3/{name?}/{matricula?}', 'ControladoresController@deletefiles3')->name('elimina3');
/* Route::get('/','Controladores@index2');
Route::post('/store','Controladores@store')->name('upload.file');
Route::get('/show','Controladores@show'); */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('usuarios', 'UsersController');
});

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('administrador', 'AdminController');
   
});

/**Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('alumnos', 'AumnoController');
   
});
Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('alumnos', 'Controladores');
   
});*/


