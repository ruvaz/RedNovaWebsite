<?php

namespace DTES\Repositories;

use DTES\Entities\State;
use DTES\Entities\City;


/**
 * 
 */
class RegisterRepo extends \Eloquent{
	
	function getAuthorizedCenters()
	{
		$data = State::has('authorized_center')
					 ->with('authorized_center.city')
					 ->get();
		return $data;
	}
	
}
