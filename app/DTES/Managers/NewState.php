<?php

namespace DTES\Managers;

/**
 * 
 */
class NewState extends BaseManager {
		
	
	public function getRules(){
		$rules = array(
			'name' => 'required | unique:states'			
		);
		return $rules;
	}
	
}
