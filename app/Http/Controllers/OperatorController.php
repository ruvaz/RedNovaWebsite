<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Repositories\OperatorRepo;
use DTES\Managers\NewOperator;
use DTES\Managers\UpdateOperator;

class OperatorController extends Controller {

	protected $operatorRepo;
	
	function __construct(OperatorRepo $operatorRepo)
	{
		$this->operatorRepo = $operatorRepo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//		
		$operators = $this->operatorRepo->getOperators();
				
		
		if($operators->count())
			return response()->json(array('data' => $operators), 200);
			
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
		
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
		$operator = $this->operatorRepo->newOperator();
		
		$manager = new NewOperator($operator, $request->all());
		
		if($manager->save())
			return response()->json(array('msg' => 'Operador creado','id' => $operator->id), 201);
		
		return response()->json(array('errors' => $manager->getErrors()),422);
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
		$operator = $this->operatorRepo->getCity($id);
		
		if($operator)
			return response()->json(array('data' => $operator), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
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
	public function update(Request $request,$id)
	{
		//
		$operator = $this->operatorRepo->getCity($id);
		
		$manager = new UpdateOperator($operator, $request->all());
		
		if($manager->save())
			return response()->json(array('msg' => 'Operador actualizado'), 200);
		
		return response()->json(array('errors' => $manager->getErrors()), 422);
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
	
	public function getOperatorsList(){
		$operators = $this->operatorRepo->getOperatorsList();
		if($operators->count())
			return response()->json(array('data' => $operators), 200);
		
		return response()->json(array('msg' => "No se encontraron resultados"), 422);
	}
}
