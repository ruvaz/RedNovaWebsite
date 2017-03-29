<?php

namespace DTES\Managers;

/**
 * 
 */
class UpdateCity extends BaseManager {
	
	public function getRules()
	{		
		$rules = array(
			'name' => 'required | unique:cities,name,'. $this->entity->id,
			'state_id' => 'required'
		);
		return $rules;
	}
}
