<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DTES\Repositories\CityRepo;
use DTES\Managers\NewCity;
use DTES\Managers\UpdateCity;

class CityController extends Controller {

	protected $cityRepo;
	
	function __construct(CityRepo $cityRepo)
	{
		$this->cityRepo = $cityRepo;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function citiesByState($id)
	{
		$cities = $this->cityRepo->getCityListByState($id);
				
		if($cities->count())
			return response()->json(array("data" => $cities), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}
	
	public function index()
	{
		//
		$cities = $this->cityRepo->getCityList();
		
		if($cities->count())
			return response()->json(array("data" => $cities), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$city = $this->cityRepo->newCity();
		
		$manager = new NewCity($city, $request->all());
		
		if($manager->save())
			return response()->json(array("msg" => "Ciudad creada"), 201);
		
		return response()->json(array("errors" => $manager->getErrors()),422);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$city = $this->cityRepo->getCity($id);
		if($city)
			return response()->json(array("data" => $city), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
		$city = $this->cityRepo->updateCity($id);
		
		$manager = new UpdateCity($city, $request->all());			
		
		if($manager->save())
			return response()->json(array("msg" => "Ciudad actualizada"), 201);
		
		return response()->json(array("errors" => $manager->getErrors()),422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//		
	}

}
