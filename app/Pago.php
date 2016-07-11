<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
	protected $fillable = ['importe', 'fecha'];
	protected $dates = ['fecha'];
	
	public function usuarios()
	{
		return $this->belongsToMany('App\Pago', 'usuariospagos');
	}
}
