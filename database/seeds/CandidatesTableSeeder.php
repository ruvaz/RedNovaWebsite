<?php
set_time_limit(0);
ini_set('memory_limit', '-1');

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use DTES\Entities\Candidate;
use DTES\Entities\Application;

/**
 * 
 */
class CandidatesTableSeeder extends Seeder 
{
	
	public function run()
	{
		
		$faker = Faker::create();				
		$admon = DB::connection('admon2');		
		$candidates = $admon->select('SELECT t1.id_est AS id,
											 t1.f_nacimiento AS birthdate,
											 UPPER(t1.l_estado) AS birthplace_state,
											 UPPER(t1.l_nacimiento) AS city,
											 UPPER(t1.d_colonia) AS colony,
											 t1.curp,
											 t1.d_cp AS cp,
											 UPPER(t1.d_correos) AS email,
											 UPPER(t1.a_nombre) AS firstname,
											 IF(t1.sexo = "M", "female","male") AS genere,
											 CONCAT(UPPER(t1.a_paterno)," ",UPPER(t1.a_materno)) AS lastname,
											 t1.d_no_ext AS n_exterior,
											 t1.d_no_int AS n_interior,
											 UPPER(t1.l_nacionalidad) AS nationality,
											 t1.d_tels AS phone,
											 UPPER(t1.d_estado) AS state,
											 UPPER(t1.d_calle) AS street,
											 UPPER(t1.d_dele_muni) AS town,
											 UPPER(t2.nombre) as tutor											 			
										FROM r_estudiantes t1
										LEFT JOIN r_padres t2
										ON t1.id_est = t2.id_est
										WHERE t1.curp IS NOT NULL										
										GROUP BY t1.curp
										ORDER BY t1.id_est ASC');
		
		
		$applications = Application::get(array('id','total_candidates'));				
		
		foreach ($applications as $app) {
			
			foreach ($candidates as $candidate) {
						
				foreach ($candidate as $key => $value)
					if($value == NULL)
						$candidate->$key = 'X';
					
				// $birthdate = date_format($faker->dateTimeThisDecade($max = 'now'),'Y-m-d');
				$authorized_persons = $admon->select('SELECT nombre FROM r_perso_autorized WHERE id_est = '.$candidate->id);
				
				if(count($authorized_persons))
				{
					$candidate->authorized_persons = array();									
					foreach ($authorized_persons as $key => $value)
						$candidate->authorized_persons[] = strtoupper($value->nombre);
										
				}								
				else
					$candidate->authorized_persons = '';
				
								
				
				if($candidate->curp)				
					$candidate = Candidate::create(array(
														'id' => $candidate->id,
														'birthdate' => $candidate->birthdate,
														'birthplace_state' => $candidate->birthplace_state,
														'city' => $candidate->city,
														'colony' => $candidate->colony,
														'curp' => $candidate->curp,
														'cp' => $candidate->cp,
														'email' => 'iscantonioshilon@gmail.com',
														'firstname' => $candidate->firstname,
														'genere' => $candidate->genere,
														'lastname' => $candidate->lastname,
														'n_exterior' => $candidate->n_exterior,
														'n_interior' => $candidate->n_interior,
														'nationality' => $candidate->nationality,
														'phone' => $candidate->phone,
														'state' => $candidate->state,
														'street' => $candidate->street,
														'town' => $candidate->town,
														'tutor' => $candidate->tutor,
														'authorized_persons' => $candidate->authorized_persons
													)
												);
				
				$applications = $admon->select('SELECT id_act as application_id												
												FROM r_est_conexion
												WHERE r_est_conexion.id_est = '.$candidate->id
											  );								
									 
				foreach ($applications as $key => $value) {	
					$candidate->applications()
						  ->attach(array($value->application_id => array(
											'registration_status' => 0,
											'proof_payment' => 	'pago_SIGA921225HCSHMN07_07-11-2016_7168.pdf',
											'payment_method' => 3,
											'candidate_id' => $candidate->id
										)
									)
							  );
				}
				// dd();								
			}
		}
		DB::disconnect('admon2');					
	}
	

}
