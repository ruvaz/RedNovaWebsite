<?php

namespace DTES\Managers;
/**
 * 
 */
 

class NewCandidate extends BaseManager {
	
	public function getRules()
	{
		$rules = array(									
					'birthplace_state' => 'required',
					'city' => 'required',
					'colony' => 'required',
					'curp' => 'required|unique:candidates',
					'cp' => 'required',
					'email' => 'required',
					'genere' => 'required',
					'lastname' => 'required',
					'firstname' => 'required',
					'n_exterior' => 'required|numeric',					
					'nationality' => 'required|alpha',
					'phone' => 'required',
					'state' => 'required',
					'street' => 'required',
					'town' => 'required'
				);
		return $rules;
	}
	
}

