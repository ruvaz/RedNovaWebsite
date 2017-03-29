<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use DTES\Repositories\RegisterRepo;
use DTES\Repositories\CandidateRepo;
use DTES\Repositories\ApplicationRepo;
use DTES\Repositories\CenniSurveyRepo;
use DTES\Repositories\VenueRepo;
use DTES\Repositories\ProductTypeRepo;
use DTES\Repositories\FunctionsRepo;

use DTES\Managers\NewCandidate;
use DTES\Managers\NewCenniSurvey;

class RegisterController extends Controller {
	
	protected $registerRepo;
	protected $applicationRepo;
	protected $candidateRepo;
	protected $cenniSurveyRepo;
	protected $venueRepo;
	protected $productTypeRepo;
	protected $functionsRepo;
	
	function __construct(RegisterRepo $registerRepo, 
						 ApplicationRepo $applicationRepo, 
						 CandidateRepo $candidateRepo, 
						 CenniSurveyRepo $cenniSurveyRepo,
						 VenueRepo $venueRepo,
						 ProductTypeRepo $productTypeRepo,
						 FunctionsRepo $functionsRepo)
	{
		$this->registerRepo = $registerRepo;
		$this->applicationRepo = $applicationRepo;
		$this->candidateRepo = $candidateRepo;
		$this->cenniSurveyRepo = $cenniSurveyRepo;
		$this->venueRepo = $venueRepo;
		$this->productTypeRepo = $productTypeRepo;
		$this->functionsRepo = $functionsRepo;
	}

	/**
	 * Display a listing of the States with cities and venues.
	 *
	 * @return Response
	 */
	public function authorizedCenters()
	{
		$states = $this->registerRepo->getAuthorizedCenters();
		
		$states = collect($states)->map(function($state){
			$state->nickname =  str_replace(' ','_', strtolower($this->functionsRepo->quitar_tildes($state->name)));			
			return $state;
		});
		return response()->json(array('states' => $states, 'labels' => trans('messages.dtes.authorized_centers')),200);
	}				
	
	public function getApplicationsUpcoming()
	{
		// $products = $this->applicationRepo->getOpenApplicationsUpcoming();	
		
		$admon_db = DB::connection('admon_rednova_server');
		
		date_default_timezone_set('America/Mexico_City');

		$fecha=date("Y-m-d");
		
		$dtes_e_query = "SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,
				   `estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito,encarguitos.codigo,encarguitos.visible
            	   FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`,`encarguitos`
            	   WHERE `productos`.`producto` = 4
            	   AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
            	   AND `activas`.`id_prod`=`productos`.`id_prod`
            	   AND `activas`.`id_sede`=`sedes`.`id_sede`
            	   AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
            	   AND `ciudades`.`id_est`=`estados`.`id_est`
             	   and encarguitos.id = activas.encarguito
             	   and encarguitos.visible = 1
             	   UNION all
				   SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,`estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito, 0 as codigo,0 as visible
		           FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`
		           WHERE `productos`.`producto` = 4
		           AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
		           AND `activas`.`cerrada`=0
		           AND `activas`.`id_prod`=`productos`.`id_prod`
		           ANd `activas`.`id_sede`=`sedes`.`id_sede`
		           AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
		           AND `ciudades`.`id_est`=`estados`.`id_est`";
		           
		$dtes_e = $admon_db->select($dtes_e_query);
		
		$dtes_1_query = "SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,
				   `estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito,encarguitos.codigo,encarguitos.visible
				   FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`,`encarguitos`
				   WHERE `productos`.`producto` = 1
				   AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
				   AND `activas`.`id_prod`=`productos`.`id_prod`
				   ANd `activas`.`id_sede`=`sedes`.`id_sede`
				   AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
				   AND `ciudades`.`id_est`=`estados`.`id_est`
             	   and encarguitos.id = activas.encarguito
         		   and encarguitos.visible = 1
				   union all
                   SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,`estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito, 0 as codigo, 0 as visible
                   FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`
                   WHERE `productos`.`producto` = 1
                   AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
                   AND `activas`.`cerrada`=0
                   AND `activas`.`id_prod`=`productos`.`id_prod`
                   ANd `activas`.`id_sede`=`sedes`.`id_sede`
                   AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
                   AND `ciudades`.`id_est`=`estados`.`id_est`";
                   
          $dtes_1 = $admon_db->select($dtes_1_query);
		
		  
		  $dtes_2_query = "SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,
				   `estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito,encarguitos.codigo,encarguitos.visible
					FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`,`encarguitos`
					WHERE `productos`.`producto` = 2
					AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
					AND `activas`.`id_prod`=`productos`.`id_prod`
					ANd `activas`.`id_sede`=`sedes`.`id_sede`
					AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
					AND `ciudades`.`id_est`=`estados`.`id_est`
		            and encarguitos.id = activas.encarguito
		            and encarguitos.visible = 1
		            union all
        			SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,`estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito, 0 as codigo,0 as visible
                    FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`
                    WHERE `productos`.`producto` = 2
                    AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
                    AND `activas`.`cerrada`=0
                    AND `activas`.`id_prod`=`productos`.`id_prod`
                    ANd `activas`.`id_sede`=`sedes`.`id_sede`
                    AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
                    AND `ciudades`.`id_est`=`estados`.`id_est`";
                    
           $dtes_2 = $admon_db->select($dtes_2_query);
           
           $dtes_3_query = "SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,
					`estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito,encarguitos.codigo,encarguitos.visible
					FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`,`encarguitos`
					WHERE `productos`.`producto` = 3
					AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
					AND `activas`.`id_prod`=`productos`.`id_prod`
					ANd `activas`.`id_sede`=`sedes`.`id_sede`
					AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
					AND `ciudades`.`id_est`=`estados`.`id_est`
		            and encarguitos.id = activas.encarguito
		            and encarguitos.visible = 1
		            union all
        			SELECT `activas`.`id_act`,`productos`.`titulo`,`sedes`.`sede`,`ciudades`.`ciudad`,`estados`.`estado`,`activas`.`f-aplic` AS f_aplic,`activas`.`f-fin` AS f_fin,`activas`.cerrada,`activas`.encarguito, 0 as codigo, 0 as visible
                    FROM `activas`,`productos`,`sedes`,`ciudades`,`estados`
                    WHERE `productos`.`producto` = 3
                    AND `activas`.`f-fin`>'".$fecha."' AND `activas`.`f-inicio`<='".$fecha."'
                    AND `activas`.`cerrada`=0
                    AND `activas`.`id_prod`=`productos`.`id_prod`
                    ANd `activas`.`id_sede`=`sedes`.`id_sede`
                    AND `sedes`.`id_ciu`=`ciudades`.`id_ciu`
                    AND `ciudades`.`id_est`=`estados`.`id_est`";
           
           $dtes_3 = $admon_db->select($dtes_3_query);                      
								
		return view('web_site.exams.dtes_registration')->with('products',['DTES-e' => [], 'DTES-1' => $dtes_1, 'DTES-2' => $dtes_2, 'DTES-3' => $dtes_3]);
	}
	
	// public function candidateRegistration($application_id)
	// {
		// \Session::put('application', $application_id);	
// 		
		// $application = $this->applicationRepo->getApplication($application_id);
// 		
		// if($application)
			// return view('dtes.candidate-registration')->with('application',$application_id);
// 		
		// return redirect('/');
	// }
	
	public function candidateRegistration($uuid)
	{
				
		$application = $this->applicationRepo->getApplicationByUUID($uuid);
		
		if($application)
		{
			\Session::put('application', $application->uuid);
			return view('dtes.candidate-registration')->with('application',$application->uuid);
		}			
		
		return redirect('/');
	}

	public function getApplicationByUUID($uuid)
	{
		$application = $this->applicationRepo->getApplicationByUUID(trim($uuid));
		
		if($application)
			return response()->json(array('data' => $application), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}
	
	
	public function uploadPaymentProof($proof_payment, $candidate_curp)
	{
		$validator = \Validator::make(
										array('proof_payment' => $proof_payment), //data
										array('proof_payment' => 'mimes:jpeg,jpg,pdf|max:10240')
									);
		if($validator->fails())
			return array(false,$validator->errors());
		
		$file_name = 'pago_'.$candidate_curp.'_'.date('d-m-Y').'_'.rand(1000, 9999).'.'.$proof_payment->getClientOriginalExtension();				
		
		if($proof_payment->getClientOriginalExtension() == 'jpeg' || $proof_payment->getClientOriginalExtension() == 'jpg' || $proof_payment->getClientOriginalExtension() == 'png')					
		$a	= \Storage::disk('dtes_image')->put($file_name,\File::get($proof_payment));					
			
		if($proof_payment->getClientOriginalExtension() == 'pdf')
		$a = \Storage::disk('dtes_pdf')->put($file_name, \File::get($proof_payment));
		
		if(!$a)
			return array(false,array(array('upload_file' => 'Error al subir el archivo. Intente más tarde')));
		
		return array(true,$file_name);		
	}		
	
	public function newCandidate(Request $request)
	{				
		
		$candidate_data = json_decode($request->all()['candidate'], true);
		$cenni_survey_data = json_decode($request->all()['cenni_survey'], true);
		$candidate_application = json_decode($request->all()['candidate_application'], true);
	
		if(isset($request->all()['proof_payment']) && (int)$candidate_application['payment_method'] == 3)
		{
			
			if($request->file('proof_payment')->isValid())
			{
					$proof_payment = $request->file('proof_payment');
					$uploadedFile =$this->uploadPaymentProof($proof_payment,$candidate_data['curp']);
					 
					if(!$uploadedFile[0])
						return response()->json(array('errors' => $uploadedFile[1]), 422);
					
					$candidate_application['proof_payment'] = $uploadedFile[1];
			}												
		}

		if((int)$candidate_application['payment_method'] == 1)
		{
			$candidate_application['folio_me'] = \Session::get('transaccionID');
		}
			
							
		$candidate = $this->candidateRepo->newCandidate();
		$cenni_survey = $this->cenniSurveyRepo->newCenniSurvey();
		
		
		$candidate->birthdate = $this->getBirthDate($candidate_data['curp'])->format('Y-m-d');
		
		
		$manager_candidate = new NewCandidate($candidate, $candidate_data);
		$manager_cenni_survey = new NewCenniSurvey($cenni_survey, $cenni_survey_data);
		
		$application = 	$this->applicationRepo->updateApplication((int)$candidate_application['application_id']);
		
		$registration = $this->saveRegistration($application, $candidate, $cenni_survey, $candidate_application, $manager_candidate, $manager_cenni_survey);
		
		if($registration['status'])
			return response()->json(array('msg' => 'En breve recibirás un correo con la información proporcionada. Dentro de 3 días hábiles recibirás la confirmación de tu pre-registro.'), 200);
		else
			return response()->json(array('errors' => $registration['errors'],'section' => $registration['section']), 200);
	
	}	

	public function saveRegistration($application, $candidate, $cenni_survey, $candidate_application, $manager_candidate, $manager_cenni_survey)
	{	
		
		$application->registered_candidates	= $application->registered_candidates + 1;
			
		DB::beginTransaction();
		
		try
		{
			
			if(!$manager_candidate->save())
			{
				DB::rollBack();	
				return array('status' => false, 'errors' => $manager_candidate->getErrors(),'section' => 'candidate');	
			}
			
			$manager_cenni_survey->entity->candidate_id = $manager_candidate->entity->id;			
			
		}
		catch(\Exception $e)
		{
			DB::rollBack();
						
			throw $e;
		}
		
		try
		{				
			$application->save();												
			
			if(!$manager_cenni_survey->save())
			{								
				DB::rollBack();
				return array('status' => false, 'errors' => $manager_cenni_survey->getErrors(),'section' => 'survey');
			}						
											
			$candidate->applications()->attach((int)$candidate_application['application_id'], $candidate_application);
		}
		catch(\Exception $e)
		{
			DB::rollBack();
			throw $e;
		}
		
		DB::commit();
		\Session::flush();
		
		 $mail = $this->sendMail($candidate, $application->id);
		return array('status' => true);			
	}
	
	public function validateFolioME($application_id, $folioME)
	{
		$rules = array('folio_me' => 'required | unique:application_candidate', 'application_id' => 'required');				
		
		$validator = \Validator::make(array(
											"folio_me" => $folioME,
											"application_id" => $application_id
											),
									 $rules
									 );				
		
		if($validator->fails())
			return response()->json(array('errors' => $validator->errors()), 422);							 
				
		$application = $this->applicationRepo->getApplication((int)$application_id);
		
		if($application)
		{
			//check if exists folio ME
			return response()->json(array('msg' => 'Folio activado.'), 200);
		}
		else
			return response()->json(array('msg' => 'Folio no válido'), 422);
					
	}
	
	public function validateCURP($application,$curp)
	{
		
		// get birthdate
		$birthdate = $this->getBirthDate($curp);
		
		$application = $this->applicationRepo->getApplication((int)$application);
		
		if(!$application) //application not found
			return response()->json(array('msg' => 'Ocurrio un error intente más tarde', 'status' => 0), 422);
									
		$application_date = Carbon::createFromFormat('Y-m-d H:m:i',date('Y-m-d H:m:i',strtotime($application->application_date)));
		$application_date_with_days = Carbon::createFromFormat('Y-m-d H:m:i',date('Y-m-d H:m:i',strtotime($application->application_date)))->addDays(15);
		
		// get candidate age				
		$age = $birthdate->diffInYears($application_date_with_days);
		
		if($age < $application->product_data->minimum_age || $age > $application->product_data->maximum_age) // get minimun age for exam		
			return response()->json(array('msg' => 'Tu edad no se encuentra en el rango permitido para realizar este exámen', 'status' => 1), 422);
		
		// check if candidate exists by CURP
		$candidate = $this->candidateRepo->getCandidateByCURP($curp);							
		
		if(!$candidate)
			return response()->json(array('msg' => 'Completa el siguiente formulario para continuar con tu registro','status' => 0), 200);
				
		//check previous registration in application selected
		if($candidate->check_previous_registration($application->id) > 0)
			return response()->json(array('msg' => 'Ya has realizado tu registro a este exámen','status' => 2), 422);
		
		//check last registration
		if(!$candidate->last_applications->count())
		{
			unset($candidate->last_applications);		
			unset($candidate->check_previous_registration);
			return response()->json(array('candidate' => $candidate,'msg' => 'Completa el siguiente formulario para continuar con tu registro','status' => 1), 200);
		}		
					
		// get last application date	
		$last_application = Carbon::createFromFormat('Y-m-d H:m:i',date('Y-m-d H:m:i',strtotime($candidate->last_applications[0]->application_date)));
		
		//check last application date smaller than current application date
		if($last_application > Carbon::now())
			return response()->json(array('msg' => 'Ya haz realizado tu registro a otro exámen'),422);										
				
		
		//get monts with last examination
		$last_application_months = $application_date->diffInMonths($last_application);
		
		// check date of last exam 
		if((int)$last_application_months < 6)
			return response()
					->json(array(
								'msg' => 'Para realizar una nueva aplicación deben pasar seis meses a partir de la fecha de su ultimo exámen.',
								'last_application_date' => $last_application->format('d-M-Y'),
								'application_date' => $application_date->format('d-M-Y'),
								'status' => 3),
							422);
											
		// return data candidate							
		unset($candidate->last_applications);
		
		return response()->json(array('candidate' => $candidate,
									  'cenni_survey' => $candidate->cenni_survey,
									  'msg' => 'Si tus datos han cambiado, puedes actualizarlos y hacer click en el botón continuar.' ,
									  'status' => 2
									  ),200);
	}
	
	public function getBirthDate($curp)
	{
		$str_curp = $curp;
		$curp = str_split($curp,2);
		
		$current_date = Carbon::now();						
		
		$c_year = (int)str_split($current_date->year,2)[1];
		
		if((int)$curp[2] >= $c_year || (int)$curp[2] > 50)
			$year = (int)$curp[2] + 1900;
		elseif((int)$curp[2] < $c_year)
			$year = (int)$curp[2] + 2000;
		
		return Carbon::create($year,(int)$curp[3],(int)$curp[4],0);
	}
	
	public function downloadBillPaymentFormat($application_id, $product_type_id)
	{				
		$application = $this->applicationRepo->getApplicationWithVenue($application_id);
		
		$product_type = $this->productTypeRepo->getProductTypeWithProduct($product_type_id);						
		
		// return view('pdfs.wire_transfer_payment',array('application' => $application, 'product' => $product_type->name, 'price' => $product_type->price));
		 		
		$html = view('pdfs.wire_transfer_payment', array('application' => $application, 'product' => $product_type->name, 'price' => $product_type->price))->render();
		$html = str_replace("/images", public_path()."/images", $html);
				
		return \PDF::load($html)
				   ->filename('formato_de_pago_'.str_replace(' ','_',$product_type->name).'.pdf')
				   ->download();
	}
	
	public function downloadPaymentFormat($application_id, $product_type_id)
	{
		$application = $this->applicationRepo->getApplicationWithVenue($application_id);
	
		$product_type = $this->productTypeRepo->getProductTypeWithProduct($product_type_id);
		
		// return view('pdfs.payment',array('application' => $application, 'product' => $product_type->name, 'price' => $product_type->price));										
		 		
		$html = view('pdfs.payment', array('application' => $application, 'product' => $product_type->name, 'price' => $product_type->price))->render();
		$html = str_replace("/images", public_path()."/images", $html);
			
		return \PDF::load($html)
				   ->filename('formato_de_pago_'.str_replace(' ','_',$product_type->name).'.pdf')
				   ->download();
	}
	
	public function sendMail($candidate, $application_id)
	{
		\Mail::send(array('html' => 'emails.welcome_dtes_registration'), array('candidate' => $candidate,'application' => $candidate->application($application_id)), function($m)use($candidate){
			$m->from('jesussg251292@gmail.com','REDNOVA CONSULTANTS');
			$m->to($candidate->email)->subject('PRE-REGISTRO DTES');
			$m->cc('jesussg251292@gmail.com');
		});
		
		return true;
	}
	
	public function emailTemplate()
	{
		$application = $this->applicationRepo->getApplication(2);
		$candidates = $application->candidates_authorized_payment;
				
		return view('pdfs.candidatesList', array('candidates' => $candidates,'application' => $application));
	}

	public function paypalPayment(Request $request)
	{
		$data = $request->all();
	    \Session::put('transaccionID', $data['tx']);
		return view('dtes.candidate-registration', array('data' => $data, 'application' => \Session::get('application')));
	}
	
	// public function paypalNotification(Request $request)
	// {
		// $this->emailTemplate();
	// }
}
