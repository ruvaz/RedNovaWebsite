<?php

namespace DTES\Entities;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Carbon\Carbon;


class CandidateApplicationPivot extends Pivot{
	
	protected $table = 'candidate_application';	
	
	public function getPaymentMethodAttribute($value)
	{
		if(!empty($value))
		{
			if($value == 1)
				return 'PAYPAL';
			elseif($value == 2)
				return 'TRANSFERENCIA BANCARIA';
			elseif($value == 3)
				return 'DEPÓSITO BANCARIO';
			elseif($value == 4)
				return 'FOLIO ME';
			elseif($value == 5)
				return 'NO REQUERIDO';
		}
		return NULL;
	}
	
	public function getRegistrationStatusAttribute($value)
	{			
		if($value == 0)
			return 'PRE-REGISTRO';
		elseif($value == 1)
			return 'PAGO AUTORIZADO';
		elseif($value == 2)
			return 'ASISTENTENCIA';
		elseif($value == 3)
			return 'FALTA';
		elseif($value == 4)
			return 'CALIFICACIONES';
	}	
	
	public function getCreatedAtAttribute($value)
	{
		return $this->attributes['created_at'] = Carbon::parse($value, 'America/Mexico_City')->timestamp * 1000;
	}
	
}
