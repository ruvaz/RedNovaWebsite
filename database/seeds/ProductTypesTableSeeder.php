<?php

use Illuminate\Database\Seeder;

use DTES\Entities\ProductType;

use DTES\Entities\Product;
/**
 * 
 */
class ProductTypesTableSeeder extends Seeder 
{
	
	public function run()
	{
		$products = $this->getProductTypes();
		
		foreach ( $products[0] as $key => $value) 
		{
			$value = (array)$value;			
			
			if($value['titulo'] == 'DTES-e')
				$value['product_id'] = 1;			
			if($value['titulo'] == 'DTES-1')
				$value['product_id'] = 2;
			if($value['titulo'] == 'DTES-2')
				$value['product_id'] = 3;
			if($value['titulo'] == 'DTES-3')
				$value['product_id'] = 4;
										
			ProductType::create(array(							
							'name' => str_replace('-', ' ', $value['titulo']),
							'price' => $value['price'],														
							'paypal_code' => '',//$value['paypal_code'],
							'product_id' => $value['product_id']				
						));
		}
		
		foreach ( $products[1] as $key => $value) 
		{
			$value = (array)$value;			
			
			if($value['titulo'] == 'DTES-e')
				$value['product_id'] = 1;			
			if($value['titulo'] == 'DTES-1')
				$value['product_id'] = 2;
			if($value['titulo'] == 'DTES-2')
				$value['product_id'] = 3;
			if($value['titulo'] == 'DTES-3')
				$value['product_id'] = 4;
										
			ProductType::create(array(							
							'name' => str_replace('-', ' ', $value['titulo']).' KIT',
							'price' => $value['price'],														
							'paypal_code' => '',//$value['paypal_code'],
							'product_id' => $value['product_id']				
						));
		}
	}

	public function getProductTypes()
	{
		
		$admon = DB::connection('admon2');
		
		$productTypes = array();
		
		$productTypes[0] = $admon->select('SELECT cod_paypal as paypal_code,
										  		  costo as price,
										  		  titulo
										   FROM productos'
										 );
		$productTypes[1] = $admon->select('SELECT cod_paypal_kit as paypal_code,
										  		  costo_kit as price,
										  		  titulo
										   FROM productos
										   WHERE cod_paypal_kit IS NOT NULL
										   AND cod_paypal_kit <> ""'
										 );
		
		DB::disconnect('admon2');
		
		return $productTypes;
	}
		
}
