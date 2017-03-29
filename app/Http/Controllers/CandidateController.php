<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Response;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DTES\Repositories\CandidateRepo;
use DTES\Repositories\ApplicationRepo;

use DTES\Entities\CandidateApplicationPivot;

class CandidateController extends Controller {

	protected $candidateRepo;
	protected $applicationRepo;
	
	function __construct(CandidateRepo $candidateRepo, ApplicationRepo $applicationRepo)
	{
		$this->candidateRepo = $candidateRepo;
		$this->applicationRepo = $applicationRepo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//
		$candidates = $this->candidateRepo->getCandidates((int)$request->per_page);
		
		if($candidates->count())
			return response($candidates, 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
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
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request,$id)
	{
		//				
		
		$candidate = $this->candidateRepo->getCandidate($id);
		
		
		if($candidate)
			return response()->json(array('data' => $candidate), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
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
	public function update($id)
	{
		//
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
	
	public function candidateDetail($application_id, $candidate_id)
	{
		$candidate = $this->candidateRepo->getCandidate((int)$candidate_id);				
			
		if($candidate)
		{
			$registration = $candidate->application($application_id)->pivot;						
						
			return response()->json(array('candidate' => $candidate, 'registration' => $registration), 200);
		}
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}

	public function showFile($filename)
	{
		// dd($filename);
		
			if($filename != NULL)
			{				
				$mime = explode('.',$filename)[1];
				if($mime != 'pdf')
					$path = storage_path().'/dtes/image/'.$filename;
				else
					$path = storage_path().'/dtes/pdf/'.$filename;
						
			if(! \File::exists($path)) 
				abort(404);
			
			$file = \File::get($path);
			$type = \File::mimeType($path);
			
			$response = \Response::make($file, 200);
		    $response->header("Content-Type", $type);
		
		    return $response;
			
			}
	}
	
	public function candidateStatus(Request $request)
	{		
		$candidate_id = (int)$request->all()['candidate'];
		$application_id = (int)$request->all()['application'];
		$status = (int)$request->all()['registration_status'];
						
		$candidate = $this->candidateRepo->getCandidate($candidate_id);
		
		$pivot = $candidate->application($application_id)->pivot;
		
		$pivot->registration_status = $status;						
		
		if($pivot->update())
		{
			
			if($status == 1)
				$this->sendMailPayment($candidate, $candidate->application($application_id));
						
			return response()->json(array('msg' => 'Status actualizado', 'status' => $pivot->registration_status), 200);
		}
		
		return response()->json(array('msg' => 'Error. Intente más tarde'), 422);
	}
	
	public function candidatesStatus(Request $request)
	{		
		
		$application_id = $request->all()['application'];
		$candidates = $request->all()['candidates'];
		$registration_status = $request->all()['registration_status'];				
					
		foreach ($candidates as $candidate_id)
		{
			$candidate = $this->candidateRepo->getCandidate($candidate_id);
		
			$pivot = $candidate->application($application_id)->pivot;
			
			$pivot->registration_status = $registration_status;											
			
			if($pivot->update())			
			{
				// if($registration_status == 1)
					// $this->sendMailPayment($candidate, $candidate->application($application_id));	
			}
		}				
		
		return response()->json(array('msg' => 'Candidatos actualizados', 'application' => $this->applicationRepo->getApplicationDetail($application_id)), 200);				
						
	}	
	public function sendMailPayment($candidate, $application)
	{		
		\Mail::send(array('html' => 'emails.authorized_payment'), 
					array('candidate' => $candidate, 'application' => $application), 
					function($m)use($candidate)
					{
						$m->from('jesussg251292@gmail.com','REDNOVA CONSULTANTS');
						$m->to($candidate->email)->subject('REGISTRO FINALIZADO');
						// $m->cc('jesussg251292@gmail.com');
					}
				);
	}
	
	public function emailTemplate()
	{
		$candidate = $this->candidateRepo->getCandidate(2);
		$this->sendMailPayment($candidate, $candidate->application(1));
		exit();
		return view('emails.authorized_payment',array('candidate' => $candidate, 'application' => $candidate->application(1)));
		
	}
	
	public function searchCandidates(Request $request, $text)
	{
		$candidates = $this->candidateRepo->searchCandidates($text, (int)$request->per_page);
		
		if($candidates->count())
			return response($candidates, 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}
	
	public function candidateInformation($candidate_id)
	{
		$candidate = $this->candidateRepo->getCandidateInformation($candidate_id);
		
		if($candidate)
			return response()->json(array('data' => $candidate), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
		
	}
	
	public function generateLists($application_id)
	{
		$application = $this->applicationRepo->getApplication($application_id);
		
		$candidates = $application->candidates_authorized_payment;				
		$candidates = $candidates->chunk($application->total_candidates_classroom);					
		
		$html = view('pdfs.header_candidates_list')->render();
		
		foreach ($candidates as $index => $list) {
			$html .= view('pdfs.candidatesList',array('application' => $application, 'candidates' => $list, 'index' => $index + 1))->render();							
		}
		
		$html .= view('pdfs.footer_candidates_list')->render();
		 
		$html = str_replace("/images", public_path()."/images", $html);
							
		return response(\PDF::load($html)->download(), 429);		
	}	
}
