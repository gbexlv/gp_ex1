<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario;

class UsuarioController extends Controller
{
	public function postNuevo(Request $request)
	{
		$this->validate($request, [
			'usuario' => ['required', 'unique:usuarios,usuario', 'min:3', 'max:16'],
			'password' => ['required' , 'min:6', 'max:32'],
			'edad' => ['required', 'numeric', 'min:18']
		]);
		
		Usuario::create([
			'usuario' => $request->usuario,
			'password' => bcrypt($request->password),
			'edad' => $request->edad
		]);
	}
	
	public function postEditar(Request $request, $id_usuario)
	{
		$usuario = Usuario::findOrFail($id_usuario);
		
		$this->validate($request, [
			'usuario' => ['required', 'unique:usuarios,usuario,' . $usuario->id, 'min:3', 'max:16'],
			'password' => ['required' , 'min:6', 'max:32'],
			'edad' => ['required', 'numeric', 'min:18']
		]);
		
		$usuario->usuario = $request->usuario;
		$usuario->password = bcrypt($request->password);
		$usuario->edad = $request->edad;
		$usuario->save();
	}
	
	public function postDelete(Request $request, $id_usuario)
	{
		$usuario = Usuario::findOrFail($id_usuario);
		$usuario->delete();
	}
}