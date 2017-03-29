<?php

namespace DTES\Managers;

/**
 * 
 */
class NewOperator extends BaseManager {
	
	public function getRules()
	{
		$rules = array(
					'name' => 'required|unique:operators',
					'phone' => 'required',
					'address' => 'required',
					'email' => 'email'
				);
		
		return $rules;
	}
}
