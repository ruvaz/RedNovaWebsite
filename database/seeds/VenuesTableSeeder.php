<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use DTES\Entities\Venue;

/**
 * 
 */
class VenuesTableSeeder extends Seeder 
{
	
	public function run()
	{		
							
		foreach($this->getVenues() as $v)
		{
			$v = (array)$v;
			
			Venue::create(array(
				'id' => $v['id'],
				'phone' => 	'X',
				'address' => 'X',
				'email' => 'X',
				'school' => $v['school'],
				'contact' => 'X',
				'status' => 0,
				'city_id' => $v['city_id'],
				'state_id' => $v['state_id']
			));
		}
	}	
	
	public function getVenues()
	{
		$admon = DB::connection('admon2');
		
		$venues = $admon->select('SELECT sedes.id_sede as id,
										 UPPER(sedes.sede) as school,										 
										 sedes.id_ciu as city_id,
										 ciudades.id_est as state_id
								  FROM sedes,ciudades
								  WHERE sedes.id_ciu = ciudades.id_ciu
								  ORDER BY sedes.id_sede'
								);
		
		DB::disconnect('admon2');
		
		return $venues;
	}
}
