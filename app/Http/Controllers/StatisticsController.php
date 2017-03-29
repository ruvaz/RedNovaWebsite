<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Repositories\StatisticsRepo;

class StatisticsController extends Controller {
	
	protected $statisticsRepo;	
	
	function __construct(StatisticsRepo $statisticsRepo)
	{
			$this->statisticsRepo = $statisticsRepo;
			
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function getStructureStates()
	{
		$states = $this->statisticsRepo->getStructureStates();
		if($states->count())
			return response()->json(array('data' => $states), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}

}
