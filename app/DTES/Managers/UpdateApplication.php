<?php

namespace DTES\Managers;

use DTES\Entities\ProductType;

/**
 * 
 */
class UpdateApplication extends BaseManager {
	
	public function getRules()
	{
		$rules = array(			
			'total_candidates_classroom' => 'required',
			'total_candidates' => 'required',
			'type' => 'required',
			'initial_registration_date' => 'required | date | before:final_registration_date',
			'final_registration_date' => 'required | date | after:initial_registration_date',
			'application_date' => 'required | date | after:final_registration_date',
			'payment' => 'required',
			'exam_id' => 'required',
			'product_id' => 'required',
			'product_types' => 'required',
			'venue_id' => 'required',
			'status' => 'required'
		);
		
		return $rules;
	}
	
	public function prepareData($data)
	{			
				
		if(count($data['product_types']))
		{			
			$product_id = $data['product_id'];
			
			foreach ($data['product_types'] as $key => $product)
			{
				if(!ProductType::where('product_id',$product_id)->find($product))
					unset($data['product_types'][$key]);
			}
			
			$data['product_types'] = json_encode($data['product_types']); 								
		}
		else 
		{
			unset($data['product_types']);			
		}
		
		return $data;
	}
	
}