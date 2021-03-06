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

Route::get('/', 'principalController@home'); 

Route::get('/inicio','principalController@home');



Route::get('/articulosCategoria/{id}','articulosController@verArticulos');

Route::get('/articuloDetalle/{codigo}','articulosController@articuloDetalle');



Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::get('/administrar','principalController@administrar');

	Route::get('/nuevoArticulo','principalController@nuevoArticulo');

	Route::get('/configurarArticulos','articulosController@configArticulos');

	Route::get('/configurarArticulo/{codigo}','articulosController@configArticulo');

	Route::post('/actualizarArticulo/{codigo}','articulosController@actualizarArticulo');
	
	Route::post('/generarArticulo','articulosController@nuevoArticulo');

	Route::get('/importarCSV','principalController@importarCSV');

	Route::get('/configurarCategorias','categoriasController@configCategorias');

	Route::get('/configurarCategoria/{id}','categoriasController@configCategoria');

	Route::post('/actualizarCategoria/{id}','categoriasController@actualizarCategoria');

	Route::get('/nuevaCategoria','principalController@nuevaCategoria');

	Route::post('/generarCategoria','categoriasController@nuevaCategoria');

	Route::post('/generarArticulosCSV','articulosController@generarArticulosCSV');	

	Route::get('/moderarComentarios','comentariosController@moderarComentarios');

	Route::get('/moderarComentario/{id}','comentariosController@moderarComentario');

	Route::post('/actualizarComentario/{id}','comentariosController@actualizarComentario');

	
});

Route::group(['middleware' => 'auth'], function (){

	Route::post('/calificarArticulo/{codigo}','articulosController@calificarArticulo');

	Route::post('/comentarArticulo/{codigo}','comentariosController@comentarArticulo');

	Route::get('/carrito','principalController@carritodeCompras');

	Route::post('/agregaraCarrito','pedidosController@agregaraCarrito');

	Route::get('/quitardelCarrito/{id}','pedidosController@quitardelCarrito');

	Route::post('/finalizarCompra','pedidosController@finalizarCompra');

	Route::post('/realizarPago','pedidosController@realizarPago');

	Route::get('/verPedidos','pedidosController@verPedidos');

	Route::get('/verPedido/{id}','pedidosController@verPedido');

	Route::get('/verPerfil/{id}','principalController@verPerfil');

	Route::get('/generarComprobante/{id}','pedidosController@generarComprobante');
});






