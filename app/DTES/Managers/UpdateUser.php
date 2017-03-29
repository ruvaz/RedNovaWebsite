<?php

namespace DTES\Managers;

/**
 * 
 */
class UpdateUser extends BaseManager
{
	
	public function getRules()
	{
		$rules = array(
				'firstname' => 'required',
				'lastname' => 'required',
				'email' => 'required|email|unique:users,email,'.$this->entity->id,
				'role' => 'required',
				'password' => 'min:6|max:20'
		);
		
		return $rules;
	}
	
	public function prepareData($data)
	{
		$data['firstname'] = strtoupper($data['firstname']);
		$data['lastname'] = strtoupper($data['lastname']);
		$data['email'] = strtolower($data['email']);
		$data['role'] = strtoupper($data['role']);
		
		return $data;
	}		
}
