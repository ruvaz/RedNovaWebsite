<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Repositories\VenueRepo;

use DTES\Managers\NewVenue;
use DTES\Managers\UpdateVenue;

class VenueController extends Controller {
	
	protected $venueRepo;
	
	function __construct(VenueRepo $venueRepo)
	{
		$this->venueRepo = $venueRepo;		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{		
		
		$venues = $this->venueRepo->getVenues((int)$request->per_page);
		
		if($venues->count())
			return response($venues,200);
		
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
		$venue = $this->venueRepo->newVenue();
		
		$manager = new NewVenue($venue, $request->all());
				
		if($manager->save())
			return response()->json(array("msg" => "Sede creada","id" => $venue->id), 201);
		
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
		$venue = $this->venueRepo->getVenue($id);
				
		if($venue)
			return response()->json(array("data" => $venue), 200);
		
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
		$venue = $this->venueRepo->updateVenue($id);
		
		$manager = new UpdateVenue($venue, $request->all());
		
		if($manager->save())
			return response()->json(array("msg" => "Aplicación actualizada", "data" => $this->venueRepo->getVenue($id)), 201);
		
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
	
	public function venuesByCity($city_id){
		$venues = $this->venueRepo->getVenuesByCity($city_id);
		
		if($venues->count())
			return response()->json(array("data" => $venues), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
		
	}
	
	public function searchVenues(Request $request, $text)
	{
		$venues = $this->venueRepo->searchVenues($text, (int)$request->per_page);
		if($venues->count())
			return response($venues,200);
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);		
	}
	
}
