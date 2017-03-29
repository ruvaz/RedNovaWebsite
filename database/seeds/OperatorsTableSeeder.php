<?php

use Illuminate\Database\Seeder;

use DTES\Entities\Operator;

/**
 * 
 */
class OperatorsTableSeeder extends Seeder 
{
	
	public function run()
	{
		
		Operator::create(
				array(
					'name' => 'REDNOVA',
					'email' => 'inforednova@grupomacmillan.com',
					'phone' => '5545536766',
					'address' => 'INSURGENTES SUR 1886, COL. FLORIDA MÉXICO'
				)
			);
	}
		
}
