<?php

namespace DTES\Managers;

/**
 * 
 */
class UpdateOperator extends BaseManager {
	
	public function getRules(){
			
		$rules = array(
					'name' => 'required|unique:operators,name,'.$this->entity->id,
					'phone' => 'required',
					'address' => 'required'
				);
		
		return $rules;
	}
	
}
