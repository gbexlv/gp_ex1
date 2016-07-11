<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favorito;

class FavoritoController extends Controller
{
	public function postNuevo(Request $request)
	{
		$this->validate($request, [
			'codigousuario' => ['required', 'exists:usuarios,codigousuario'],
		]);
		
		Favorito::create([
			'codigousuario' => $request->user()->codigousuario,
			'codigousuariofavorito' => $request->codigousuario
		]);
	}
	
	/*
	 * id (int) = referencia a ID del favorito
	 */
	public function postDelete(Request $request, $id)
	{
		$favorito = Favorito::findOrFail($id);
		$favorito->delete();
	}
}