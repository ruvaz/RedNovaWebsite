<?php  

namespace DTES\Repositories;

use DTES\Entities\Venue;

use Carbon\Carbon;

/**
 * 
 */
class VenueRepo extends \Eloquent {
		
	public function newVenue()
	{		
		$venue = new Venue();
		$venue->status = 1;
		$venue->created_at = Carbon::now('America/Mexico_City');
		$venue->updated_at = Carbon::now('America/Mexico_City');
		
		return $venue;
	}
	
	public function getVenues($perPage)
	{
		if($perPage != $this->perPage)
			$this->perPage = $perPage;
										
		return Venue::with('state','city')->orderBy('school', 'ASC')->paginate($this->perPage);
	}
	
	public function getVenue($id)
	{
		return Venue::with('state','city')->find($id);
	}
	
	public function getVenuesByCity($id)
	{
		return Venue::where('city_id', '=', $id)
					->get(array('id','school'));
	}
	
	public function updateVenue($id)
	{
		$venue = Venue::find($id);
		$venue->updated_at = Carbon::now();
		
		return $venue;
	}
	
	public function searchVenues($text, $perPage)
	{
		if($perPage != $this->perPage)
			$this->perPage = $perPage;
		
		return Venue::whereHas('state', function($query)use($text){
						$query->where('name','LIKE','%'.$text.'%');						  
					})
					->orWhereHas('city', function($query)use($text){
						$query->where('name','LIKE','%'.$text.'%');						  
					})
					->orWhere('school','LIKE','%'.$text.'%')
					->with('state','city')
					->orderBy('school','ASC')
					->paginate($this->perPage);
	}
}
