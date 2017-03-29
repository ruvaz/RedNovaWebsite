<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Repositories\ProductRepo;
use DTES\Managers\UpdateProduct;
use DTES\Managers\NewProduct;

class ProductController extends Controller {

	protected $productRepo;
	
	function __construct(ProductRepo $productRepo)
	{
		$this->productRepo = $productRepo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$products = $this->productRepo->getProducts();
		
		if($products->count())
			return response()->json(array('data' => $products), 200);
		
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
		$product = $this->productRepo->newProduct();
		$manager = new NewProduct($product, $request->all());
		// dd($request->all());
		
		if($manager->save())
			return response()->json(array('msg' => 'Producto agregado','id' => $product->id), 200);
		
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
		$product = $this->productRepo->getProduct($id);
		
		if($product)
			return response()->json(array('data' => $product), 200);
		
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
	public function update(Request $response, $id)
	{
		//
		$product = $this->productRepo->getProduct($id);
		
		$manager = new UpdateProduct($product, $response->all());
		
		if($manager->save())	
			return response()->json(array('msg' => 'Producto actualizado'), 200);
		
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

	public function getListProducts()
	{
		$products = $this->productRepo->getListProducts();
		
		if($products->count())
			return response()->json(array('data' => $products),200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}
}
