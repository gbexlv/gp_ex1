<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group('usuarios', function() {
	Route::post('nuevo', 'UsuarioController@postNuevo');
	Route::post('editar/{id}', 'UsuarioController@postEditar');
	Route::post('eliminar/{id}', 'UsuarioController@postDelete');
});

Route::group('favoritos', function() {
	Route::post('nuevo', 'FavoritoController@postNuevo');
	Route::post('eliminar/{id}', 'FavoritoController@postDelete');
});

Route::group('pagos', function() {
	Route::post('nuevo', 'PagoController@postNuevo');
	Route::post('editar/{id}', 'PagoController@postEditar');
	Route::post('eliminar/{id}', 'PagoController@postDelete');
});