<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio','principalController@home');

Route::get('/nuevoArticulo','principalController@nuevoArticulo');

Route::get('/administrar','principalController@administrar');

Route::get('/articulosCategoria/{id}','articulosController@verArticulos');

Route::get('/articuloDetalle/{codigo}','articulosController@articuloDetalle');

Route::get('/configurarArticulos','articulosController@configArticulos');

Route::get('/configurarArticulo/{codigo}','articulosController@configArticulo');

Route::post('/actualizarArticulo/{codigo}','articulosController@actualizarArticulo');

Route::post('/generarArticulo','articulosController@nuevoArticulo');

Route::get('/configurarCategorias','categoriasController@configCategorias');

Route::get('/configurarCategoria/{id}','CategoriasController@configCategoria');

Route::post('/actualizarCategoria/{id}','categoriasController@actualizarCategoria');



Auth::routes();



