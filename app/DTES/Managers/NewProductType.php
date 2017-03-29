<?php

namespace DTES\Managers;

/**
 * 
 */
class NewProductType extends BaseManager {
	
	public function getRules()
	{
		$rules = array(
			'name' => 'required',
			'price' => 'required',
			'paypal_code' => 'required|unique:product_types',
			'product_id' => 'required'
		);		
		return $rules;
	}
		
}
