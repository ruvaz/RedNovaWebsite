<?php

namespace DTES\Repositories;

use DTES\Entities\City;
use Carbon\Carbon;

/**
 * 
 */
class CityRepo extends \Eloquent {
	
	public function newCity()
	{
		
		$city = new City();
		$city->created_at = Carbon::now('America/Mexico_City');
		$city->updated_at = Carbon::now('America/Mexico_City');
		return $city;
		
	}
	
	public function getCityList()
	{
				
		return City::orderBy('name','ASC')->get(array('name', 'id'));
					
	}
	
	public function getCityListByState($state_id)
	{
		
		return City::where('state_id', '=', $state_id)
				   ->orderBy('name','ASC')
				   ->get(array('name', 'id'));
			
	}
	
	public function getCity($id)
	{
		return City::find($id);
	}
	
	public function updateCity($id)
	{
		$city = City::find($id);
		$city->updated_at = Carbon::now('America/Mexico_City');
		
		return $city;
	}
	
}
