<?php

use Illuminate\Database\Seeder;
use DTES\Entities\City;
/**
 * 
 */
class CitiesTableSeeder extends Seeder 
{

	public function run()
	{		
		foreach($this->getCities() as $c)
		{
			$c = (array)$c;
			
			City::create(array(
				'id' => $c['id'],
				'name' => $c['name'],
				'state_id' => $c['state_id']
			));												
		}
	}	
	
	public function getCities()
	{
		$admon = DB::connection('admon2');
		
		$cities = $admon->select('SELECT ciudades.id_ciu as id,
										 UPPER(ciudades.ciudad) as name,
								  		 ciudades.id_est as state_id
								  FROM ciudades, estados, sedes
								  WHERE ciudades.id_est = estados.id_est
								  AND sedes.id_ciu = ciudades.id_ciu
								  GROUP BY ciudades.id_ciu
								  ORDER BY ciudades.id_est'
								);
		
		DB::disconnect('admon2');
		
		return $cities;
	}
	
}
