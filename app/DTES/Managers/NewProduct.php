<?php

namespace DTES\Managers;

/**
 * 
 */
class NewProduct extends BaseManager {
	
	public function getRules()
	{
		$rules = array(				
				'name' => 'required | unique:products',
				'maximum_age' => 'required',
				'minimum_age' => 'required'
		);
		
		return $rules;
	}
}

