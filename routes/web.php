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
Route::get('/', 'Controladores@index')->name('recibir');
Route::post('/', 'Controladores@buscador')->name('buscador');
Route::get('/detalleAlumno/{matricula?}', 'Controladores@detalleAlumno')->name('upload');

Route::post('/a', 'Controladores@actualizar')->name('actualizar');
Route::post('/store/{matricula?}','Controladores@store')->name('upload.file');
Route::post('/store2/{matricula?}','Controladores@store2')->name('upload.file2');
Route::post('/store3/{matricula?}','Controladores@store3')->name('upload.file3');

//Route::get('/descarga/{name?}/{matricula?}', 'Controladores@descarga')->name('descarga');
Route::get('/descarga/{name?}/{matricula?}', 'Controladores@descarga');
Route::get('/descarga2/{name?}/{matricula?}', 'Controladores@descarga2');
Route::get('/descarga3/{name?}/{matricula?}', 'Controladores@descarga3');

Route::get('/delete/{name?}/{matricula?}', 'Controladores@deletefiles')->name('elimina');
Route::get('/delete2/{name?}/{matricula?}', 'Controladores@deletefiles2')->name('elimina2');
Route::get('/delete3/{name?}/{matricula?}', 'Controladores@deletefiles3')->name('elimina3');
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

Route::group(['middleware' => ['role:super-admin|editor|moderador']], function() {
    Route::resource('alumnos', 'AumnoController');
   
});


