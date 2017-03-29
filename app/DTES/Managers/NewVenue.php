<?php

namespace DTES\Managers;

/**
 * 
 */
class NewVenue extends BaseManager {
	
	
	
	public function getRules()
	{		
				
		$rules = array(
			'phone' => 'required',
			'address' => 'required|string|min:10|max:300',
			'email' => 'required',
			'school' => 'required|string|min:6|max:300',
			'contact' => 'required|string|min:6|max:100',
			'discount' => 'required',
			'state_id' => 'required|exists:states,id',
			'city_id' => 'required|exists:cities,id'
		);
		
		return $rules;
	}
}
