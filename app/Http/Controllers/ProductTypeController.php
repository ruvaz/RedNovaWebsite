<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Repositories\ProductTypeRepo;

use DTES\Managers\NewProductType;
use DTES\Managers\UpdateProductType;

class ProductTypeController extends Controller {

	protected $productTypeRepo;
	
	function __construct(ProductTypeRepo $productTypeRepo)
	{
		$this->productTypeRepo = $productTypeRepo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$productTypes = $this->productTypeRepo->getProductTypes();
		
		if($productTypes->count())
			return response()->json(array('data' => $productTypes), 200);
		
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
		$productType = $this->productTypeRepo->newProductType();
		$manager = new NewProductType($productType, $request->all());
		
		if($manager->save())
			return response()->json(array('msg' => 'Producto creado','id' => $productType->id), 201);
		
		return response()->json(array('errors' => $manager->getErrors()), 422);
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
		$productType = $this->productTypeRepo->getProductTypeWithProduct($id);				
		
		if($productType)
			return response()->json(array('data' => $productType), 200);
				
		return response()->json(array('msg' => 'No se encontraron resultador'), 422);
		
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
		$productType = $this->productTypeRepo->getProductType($id);
		
		$manager = new UpdateProductType($productType, $request->all());				
		
		if($manager->save())
			return response()->json(array('msg' => 'Versión del producto actualizada'), 200);
		
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

}
