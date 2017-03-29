<?php

namespace DTES\Managers;

/**
 * 
 */
class NewCity extends BaseManager {
	
	function getRules() 
	{
		$rules = array(
			'name' => 'required|unique:cities|min:4|max:30',
			'state_id' => 'required'
		);
				
		return $rules;
	}
}
