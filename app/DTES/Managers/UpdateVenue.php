<?php

namespace DTES\Managers;

/**
 * 
 */
class UpdateVenue extends BaseManager {
	
	public function getRules()
	{
		$rules = array(
			'phone' => 'required',
			'address' => 'required|string|min:10|max:100',
			'email' => 'required',
			'school' => 'required',
			'contact' => 'required',
			'discount' => 'required',			
			'state_id' => 'required',
			'city_id' => 'required',
			'status' => 'required'
		);
		
		return $rules;
	}
	
}
