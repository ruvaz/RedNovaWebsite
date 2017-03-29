<?php namespace App\Http\Controllers;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DTES\Managers\NewApplication;
use DTES\Managers\UpdateApplication;

use DTES\Repositories\ApplicationRepo;
use DTES\Repositories\VenueRepo;
use DTES\Repositories\FunctionsRepo;


class ApplicationController extends Controller {

	protected $applicationRepo;
	protected $venueRepo;
	protected $functionsRepo;
	
	function __construct(ApplicationRepo $applicationRepo, VenueRepo $venueRepo, FunctionsRepo $functionsRepo)
	{
		$this->applicationRepo = $applicationRepo;
		$this->venueRepo = $venueRepo;
		$this->functionsRepo = $functionsRepo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//
		$applications = $this->applicationRepo->getApplications((int)$request->per_page);				
				
		if($applications->count())
			return response($applications, 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//				
		$application = $this->applicationRepo->newApplication();
		
		$manager = new NewApplication($application, $request->all());
		
		if($manager->save()){
			
			$venue = $this->venueRepo->getVenue($application->venue_id);
			
			if($venue)
				$application->query_string_school = strtoupper($this->functionsRepo->quitar_tildes($venue->school));
			
			$application->uuid = $application->generateUUID(false,$application->id);
			
			$application->save();
						
			return response()->json(array("msg" => "Aplicacion creada","data" => $this->applicationRepo->getApplication($application->id)), 201);
		}
		
		return response()->json(array("errors" => $manager->getErrors()),422);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//		
		$application = $this->applicationRepo->getApplication($id);
		
		if($application->count())
			return response()->json(array("data" => $application), 200);
		
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//			
		$application = $this->applicationRepo->updateApplication($id);									
		
		$venue_id = $application->venue_id;
		
		$manager = new UpdateApplication($application, $request->all());
		
		if($manager->save())
		{		
			if($venue_id != (int)$request->all()['venue_id'])
			{
			
				$venue = $this->venueRepo->getVenue((int)$request->all()['venue_id']);						
				
				if($venue)
				{
					$application->query_string_school = strtoupper($this->functionsRepo->quitar_tildes($venue->school));
					$application->save();
				}						
									
			}		
			return response()->json(array("msg" => "Aplicación actualizada","data" => $this->applicationRepo->getApplication($id)), 201);				
		}
		else
			return response()->json(array("errors" => $manager->getErrors()),422);		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function getOpenApplicationsUpcoming()
	{
		$applications = $this->applicationRepo->getOpenApplicationsUpcoming();				
		
		if($applications->count())
			return response()->json(array("data" => $applications),200);
			
		return response()->json(array("msg" => "No se encontraron resultados"), 422);
	}
	
	public function getApplicationHistory($initial_date, $final_date = '')
	{
		$errors_final_date = array();
		
		$validator_initial_date = Validator::make(array('initial_date' => $initial_date),
			array('initial_date' => 'required|date_format:"Y-m-d"')
		);
		
		if($final_date)
		{
			$validator_final_date = Validator::make(array('final_date' => $final_date),
				array('final_date' => 'date_format:"Y-m-d"')
			);
			if($validator_final_date->fails())
				return response()->json(array('errors' => $validator_final_date->errors()), 422);
		}
				
		if($validator_initial_date->fails())
			return response()->json(array('errors' => $validator_initial_date->errors()), 422);
				
		$applications = $this->applicationRepo->getHistoryApplication($initial_date, $final_date);
		if($applications->count())
			return response()->json(array('data' => $applications),200);
		
		return response()->json(array('msg' => 'No se encrontraron resultados'), 422);
	}
	
	public function getApplicationDetail($application)
	{
		$application = $this->applicationRepo->getApplicationDetail((int)$application);
		
		if($application)
			return response()->json(array('data' => $application), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}
	
	public function searchApplications(Request $request,  $text)
	{
		$applications = $this->applicationRepo->searchApplications($text, (int)$request->per_page);
		
		if($applications->count())
			return response($applications, 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);		
	}		
	
	public function shareApplicationLink(Request $request)
	{
		$data = $request->all();
		$application = $this->applicationRepo->getApplicationByUUID($data['uuid']);
		
		if($application)
		{
			unset($data['uuid']);
			
			// return view('emails.share_application_link',array('application' => $application, 'contact' => $data, 'venue' => $application->venue_data));			
		
			\Mail::send(array('html' => 'emails.share_application_link'), array('application' => $application, 'contact' => $data, 'venue' => $application->venue_data), function($m)use($data){
				$m->from('jesussg251292@gmail.com','REDNOVA CONSULTANTS');
				// $m->to('iscantonioshilon@gmail.com')->subject('PÁGINA DE REGISTRO DTES');				
				$m->to($data['email'])->subject('PÁGINA DE REGISTRO DTES');
				$m->cc('jesussg251292@gmail.com');
			});
			
			return response()->json(array('msg' => 'Se ha compartido el enlace de la aplicación.'), 200);	
		}
		
		return response()->json(array('msg' => 'No se encontraron resultados.'), 422);
				
	}
}
