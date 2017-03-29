<?php

namespace DTES\Repositories;

use DTES\Entities\State;

/**
 * 
 */
class StatisticsRepo extends \Eloquent 
{
	
	public function getStructureStates()
	{
		return State::with('cities.venues')
					->orderBy('name','ASC')
					->get();
	}	
	
}
