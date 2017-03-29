<?php

namespace DTES\Repositories;

use DTES\Entities\ProductType;

use Carbon\Carbon;

/**
 * 
 */
class ProductTypeRepo extends \Eloquent {
	
	public function newProductType()
	{
		$productType = new ProductType();
		$productType->created_at = Carbon::now('America/Mexico_City');
		$productType->updated_at = Carbon::now('America/Mexico_City');
		
		return $productType;
	}
	
	public function getProductTypes()
	{
		return ProductType::with('product')
						  ->orderBy('name','ASC')
						  ->get();
	}	
	
	public function getProductType($id)
	{
		return ProductType::find($id);
	}		
	
	public function getProductTypeWithProduct($id)
	{
		return ProductType::with('product')->find($id);
	}
	
}
