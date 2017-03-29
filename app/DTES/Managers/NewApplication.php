<?php

namespace DTES\Managers;
use DTES\Entities\ProductType;

/**
 * 
 */
class NewApplication extends BaseManager {
	
	public function getRules()
	{
		$rules = array(			
			'total_candidates_classroom' => 'required | integer',
			'total_candidates' => 'required | integer',
			'type' => 'required',
			'initial_registration_date' => 'required | date | before:final_registration_date',
			'final_registration_date' => 'required | date | after:initial_registration_date',
			'application_date' => 'required | date | after:final_registration_date',			
			'exam_id' => 'required',
			'product_id' => 'required',
			'product_types' => 'required',
			'venue_id' => 'required'
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
