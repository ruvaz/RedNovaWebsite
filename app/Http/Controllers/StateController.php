<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Repositories\StateRepo;
use DTES\Managers\NewState;

class StateController extends Controller {
	
	protected $stateRepo;

	function __construct(StateRepo $stateRepo){
		$this->stateRepo = $stateRepo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$states = $this->stateRepo->getStatesList();		
		if($states->count())
			return response()->json(array("data" => $states), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
			
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	// public function create()
	// {		
// 				
	// }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$state = $this->stateRepo->newstate();
		$manager = new NewState($state, $request->all());
		
		if($manager->save())
			return response()->json(array("msg" => "Estado creado"), 201);
			
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
		$state = $this->stateRepo->getState($id);
		
		if($state)
			return response()->json(array("data" => $state), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// public function edit($id)
	// {
		// //
		// dd("E");
	// }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
		$data = $request->all();
		$state = $this->stateRepo->updateState($id);
		
		$manager = new NewState($state, $data);
		
		if($manager->save())
			return response()->json(array("msg" => "Estado actualizado"), 200);
		
		return response()->json(array("errors" => $manager->getErrors()), 422);
		
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
		dd("G");
	}

}
