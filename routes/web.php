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


Route::get('/', 'personaController@index')->name('persona.index');//esta es la ruta que lleva al inicio
Route::post('/persona/import', 'reportecontroller@importPersonas')->name('persona.import');//esta es la ruta para importar los registros
Route::get('/persona/reporte', 'reportecontroller@reportePersona')->name('persona.reporte');//esta es la ruta que te exporta el reporte en excel

Route::get('/persona/listing', 'personaController@listing')->name('persona.listing');//esta ruta me lista los registros de la tabla persona
Route::post('/persona/busqueda', 'personaController@Search')->name('persona.Search');//esta es la ruta para buscar mediante la cedula
Route::get('/persona/grafica', 'personaController@grafica')->name('persona.grafica');//esta es la ruta para mostrar la grafica
Route::resource('/persona', 'personaController');//este se el controlador principal
