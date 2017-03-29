<?php


namespace DTES\Managers;



class UpdateProductType extends BaseManager {
	
	public function getRules()
	{
		$rules = array(
						'name' => 'required',
						'price' => 'required',
						'product_id' => 'required',
						'paypal_code' => 'required|unique:product_types,paypal_code,'.$this->entity->id
				);	
				
		return $rules;
	} 	
}
