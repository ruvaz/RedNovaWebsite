<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

// Entities
use DTES\Entities\Application;
use DTES\Entities\Operator;
use DTES\Entities\ProductType;
use DTES\Entities\Product;
use DTES\Repositories\FunctionsRepo;

/**
 * 
 */
class ApplicationsTableSeeder extends Seeder 
{		
	
	protected $functionsRepo;
	
	function __construct(FunctionsRepo $functionsRepo)
	{
		$this->functionsRepo = $functionsRepo;
	}
	
	public function run()
	{		
		
		$operator = Operator::find(1);
		
				
		foreach($this->getApplications() as $key => $app)
		{									
			
			$product = Product::where('name',str_replace('-', ' ', $app->titulo))->get(array('id'))->first();						
			
			$app->product_types = ProductType::where('product_id', $product->id)->lists('id');
					
			if($key < 100){
				$a = '2016-03-01';
				$b = '2016-03-15';
				$c = '2016-03-28';
			}
			if($key > 100 && $key < 200){
				$a = '2016-04-01';
				$b = '2016-04-15';
				$c = '2016-04-28';
			}			
			if($key > 200 && $key < 300){
				$a = '2016-05-01';
				$b = '2016-05-15';
				$c = '2016-05-28';
			}
			if($key > 300 && $key < 400){
				$a = '2016-06-01';
				$b = '2016-06-15';
				$c = '2016-06-28';
			}
			if($key > 400 && $key < 500){
				$a = '2016-07-01';
				$b = '2016-07-15';
				$c = '2016-07-28';
			}
			if($key > 500 && $key < 600){
				$a = '2016-08-01';
				$b = '2016-08-15';
				$c = '2016-08-28';
			}
			if($key > 600 && $key < 700){
				$a = '2016-09-01';
				$b = '2016-09-15';
				$c = '2016-09-28';
			}
			if($key > 700 && $key < 800){
				$a = '2016-10-01';
				$b = '2016-10-15';
				$c = '2016-10-28';
			}
			if($key > 800 && $key < 900){
				$a = '2016-11-01';
				$b = '2016-11-15';
				$c = '2016-11-28';
			}
			if($key > 900 && $key < 1000){
				$a = '2016-12-01';
				$b = '2016-12-15';
				$c = '2016-12-28';
			}		
					
			$application = Application::create(array(
					'id' => $app->id,
					'total_candidates_classroom' => 25,
					'total_candidates' => $app->registered_candidates,
					'registered_candidates' => $app->registered_candidates,
					'type' => $app->type,
					'initial_registration_date' => $a,
					'final_registration_date' => $b,
					'application_date' => $c,
					'payment' => 0,
					'query_string_school' => strtoupper($this->functionsRepo->quitar_tildes($app->venue_name)),
					'status' => 0,
					'product_id' => $product->id,
					'product_types' => json_encode(array($app->product_types[0])),
					'operator_id' => $operator->id,
					'venue_id' => $app->venue_id,
					'exam_id' => 1
				)
			);	
			
			$application->uuid = $application->generateUUID(false,$application->id);
			$application->save();	
		}				
	}

	public function getApplications()
	{
		$admon = DB::connection('admon2');
		
		$applications = $admon->select('SELECT activas.id_act as id,
											   activas.id_sede as venue_id,
											   sedes.sede as venue_name,
											   activas.f_inicio as initial_registration_date,
											   activas.f_fin as final_registration_date,
											   activas.f_aplic as application_date,
											   IF(activas.cerrada = 1, "close","open") as type,
											   COUNT(r_est_conexion.id_act) as registered_candidates,
											   productos.titulo
										FROM activas,r_est_conexion,productos,sedes
										WHERE activas.id_act = r_est_conexion.id_act
										AND activas.id_prod = productos.id_prod
										AND activas.id_sede = sedes.id_sede
										GROUP BY activas.id_act');
		DB::disconnect('admon2');
		
		return $applications;
	}
}
