<?php
namespace DTES\Repositories;

use DTES\Entities\Application;

use DTES\Entities\Product;

use Carbon\Carbon;
 
class ApplicationRepo extends \Eloquent {
	
	public function newApplication(){
		$application = new Application();
		$application->created_at = Carbon::now('America/Mexico_City');
		$application->updated_at = Carbon::now('America/Mexico_City');
		$application->status = 0;
				
		return $application;
	}
	
	public function getApplications($perPage)
	{
		if($perPage != $this->perPage)
			$this->perPage = $perPage;
		
		return Application::with('venue.state','venue.city','product')
						  ->whereDate('final_registration_date','>',Carbon::now())
						  ->orderBy('application_date','ASC')					  
						  ->paginate($this->perPage);
	}
	
	public function getApplication($id)
	{
		return Application::with('venue.state','venue.city','product.types','operator')
						  ->find($id);
	}
	
	public function getApplicationByUUID($uuid)
	{
		return Application::with('venue.state','venue.city','product.types','operator')
						  ->where('uuid',$uuid)
						  ->first();
	}
	
	public function getApplicationWithVenue($id)
	{
		return Application::with('venue_data')
						  ->find($id);
	}
	
	public function updateApplication($id)
	{
		$application = Application::with('venue')->find($id);
		$application->updated_at = carbon::now();
		
		return $application;
	}
	
	public function getOpenApplicationsUpcoming()
	{
		$applications = Product::with(array('openApplications' => function($query)
							   	{
							   		$query->where('final_registration_date', '>', Carbon::now());
										  
							   	},'openApplications.venue.state','openApplications.venue.city'))								
							   	->get();		
		return $applications;
	}
	
	public function getHistoryApplication($initial_date, $final_date)
	{
		$initial = Carbon::createFromFormat('Y-m-d', $initial_date)->format('Y-m-d');				
		
		if($final_date)
		{
			return Application::with('venue.state','venue.city','product')
							  ->whereBetween('application_date',array($initial_date, $final_date))
							  ->get();
		}			
		else {			
			return Application::with('venue.state','venue.city','product')
							  ->whereDate('application_date','=',$initial)
							  ->get();
		}
	}
	
	public function getApplicationDetail($application_id)
	{
		return Application::with('venue_data.state',
								 'venue_data.city',
								 'product_data',
								 'candidates_pre_registration',
								 'candidates_authorized_payment',
								 'candidates_attendance',
								 'candidates_non_attendance',
								 'operator_data')
							->find($application_id);
	}

	public function searchApplications($text, $perPage)
	{
		if($perPage != $this->perPage)
			$this->perPage = $perPage;
		
		return Application::whereHas('product', function($query)use($text)
						  {
						  	$query->where('name','LIKE','%'.$text.'%')
						  		  ->whereDate('final_registration_date','>',Carbon::now());
								
						  })
						  ->orWhereHas('venue.state', function($query)use($text)
						  {
						  	$query->where('name','LIKE','%'.$text.'%')
						  		  ->whereDate('final_registration_date','>',Carbon::now());	
						  })
						  ->orWhereHas('venue.city', function($query)use($text)
						  {
						  	$query->where('name','LIKE','%'.$text.'%')
						  		  ->whereDate('final_registration_date','>',Carbon::now());	
						  })
						  ->orWhereHas('venue', function($query)use($text)
						  {
						  	$query->where('school','LIKE','%'.$text.'%')
						  		  ->whereDate('final_registration_date','>',Carbon::now());	
						  })
						  ->with('product','venue.state','venue.city')
						  ->orderBy('application_date','ASC')
						  ->paginate($this->perPage);
	}
}
