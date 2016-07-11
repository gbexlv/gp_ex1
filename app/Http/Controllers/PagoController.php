<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pago;

class PagoController extends Controller
{
	public function postNuevo(Request $request)
	{
		$this->validate($request, [
			'importe' => ['required', 'numeric', 'min:1'],
			'fecha' => ['required', 'date', 'before:today']
		]);
		
		$pago = Pago::create([
			'codigousuario' => $request->user()->codigousuario,
			'codigousuariofavorito' => $request->codigousuario
		]);
		
		$pago->usuarios->attach($request->user()->id);
	}
	
	public function postEditar(Request $request, $id_pago)
	{
		$pago = Pago::findOrFail($id_pago);
	
		$this->validate($request, [
			'importe' => ['required', 'numeric', 'min:1'],
			'fecha' => ['required', 'date', 'before:today']
		]);
	
		$pago->importe = $request->importe;
		$pago->fecha = $request->fecha;
		$pago->save();
	}
	
	public function postDelete(Request $request, $id)
	{
		$pago = Pago::findOrFail($id);
		$pago->delete();
	}
}
