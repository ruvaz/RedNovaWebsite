<?php

// Composer: "fzaninotto/faker": "v1.3.*"
use Illuminate\Database\Seeder;

use DTES\Entities\State;

use Faker\Factory as Faker;

class StatesTableSeeder extends Seeder {		
	
	public function run()
	{
		
							
		foreach($this->getStates() as $s)
		{
			
			$s = (array)$s;
			
			State::create(array(
				'id' => $s['id'],
				'name' => $s['name'] 
			));			
		}

	}
	
	public function getStates()
	{
		$admon = DB::connection('admon2');
		
		$states = $admon->select('SELECT id_est as id,
										 IF(UPPER(estado) = "DISTRITO FEDERAL","CIUDAD DE MÉXICO",UPPER(estado)) as name
								  FROM estados
								  ORDER BY id_est'
								);
				
		DB::disconnect('admon2');
		
		return $states;
	}
	
}
