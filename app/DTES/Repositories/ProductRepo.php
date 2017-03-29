<?php

namespace DTES\Repositories;

use DTES\Entities\Product;
use Carbon\Carbon;

/**
 * 
 */
class ProductRepo extends \Eloquent{
	
	public function newProduct()
	{
		$product = new Product();
		$product->created_at = Carbon::now('America/Mexico_City');
		$product->updated_at = Carbon::now('America/Mexico_City');
		
		return $product;
	}
	
	public function getProducts()
	{
		return Product::all();
	}
	
	public function getProduct($id)
	{
		return Product::find($id);
	}
	
	public function getListProducts()
	{
		return Product::with('types')
					  ->orderBy('name','ASC')
					  ->get(array('id','name'));
	}
}
