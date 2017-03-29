<?php


namespace DTES\Repositories;

use DTES\Entities\Operator;
use Carbon\Carbon;
/**
 * 
 */
class OperatorRepo extends \Eloquent 
{
	
	public function getOperatorsList()
	{
		return Operator::orderBy('name','ASC')
					   ->get(array('id','name'));
	}	
	
	public function newOperator()
	{
		$operator = new Operator();
		
		$operator->created_at = Carbon::now('America/Mexico_City');
		$operator->updated_at = Carbon::now('America/Mexico_City');
		
		return $operator;
	}
	
	public function getOperators()
	{
		$operators =  Operator::all();
		return $operators;
	}
	
	public function getCity($id)
	{
		return Operator::find($id);
	}
}
