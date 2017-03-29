<?php
// Composer: "fzaninotto/faker": "v1.3.*"
use Illuminate\Database\Seeder;

use DTES\Entities\Product;

class ProductsTableSeeder extends Seeder {
	
	public function run()
	{		
		
		Product::create(array(							
							'name' => 'DTES e',
							'parents_information' => true,
							'maximum_age' => 12,
							'minimum_age' => 8
						));
		
		Product::create(array(
							'name' => 'DTES 1',
							'parents_information' => true,				
							'maximum_age' => 99,
							'minimum_age' => 10							
						));					
		
		Product::create(array(							
							'name' => 'DTES 2',
							'parents_information' => false,							
							'maximum_age' => 99,
							'minimum_age' => 10
						));
		
		Product::create(array(
							'name' => 'DTES 3',
							'parents_information' => false,
							'maximum_age' => 99,
							'minimum_age' => 10
						));					
	}		
}
