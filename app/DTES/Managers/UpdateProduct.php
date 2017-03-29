<?php


namespace DTES\Managers;
/**
 * 
 */
class UpdateProduct extends BaseManager 
{
	
	public function getRules()
	{
		$rules = array(				
				'name' => 'required|unique:products,name,'.$this->entity->id,										
				'maximum_age' => 'required',
				'minimum_age' => 'required'				
		);
		
		return $rules;
	}	
	
}
