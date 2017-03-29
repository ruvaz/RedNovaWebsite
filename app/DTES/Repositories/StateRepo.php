<?php

namespace DTES\Repositories;

use DTES\Entities\State;
use Carbon\Carbon;

class StateRepo extends \Eloquent{
	
	public function newState()
	{
		$state = new State();
		$state->created_at = Carbon::now('America/Mexico_City');
		$state->updated_at = Carbon::now('America/Mexico_City');
		return $state;
	}
	
	public function getStatesList()
	{
		return State::orderBy('name','ASC')->get(array('name','id'));
					// ->lists('name', 'id');
	}
	
	public function getState($id)
	{
		return State::find($id);	
	}
	
	public function updateState($id)
	{
		$state = State::find($id);
		$state->updated_at = Carbon::now('America/Mexico_City');
		
		return $state;
	}
}
