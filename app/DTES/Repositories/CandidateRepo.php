<?php

namespace DTES\Repositories;

/**
 * 
 */
use DTES\Entities\Candidate;
use Carbon\Carbon;
 
class CandidateRepo extends \Eloquent{
	
	public function newCandidate()
	{
		$candidate = new Candidate();
		$candidate->created_at = Carbon::now('America/Mexico_City');
		$candidate->updated_at = Carbon::now('America/Mexico_City');		
				
		return $candidate;
		
	}
	
	public function getCandidates($perPage)
	{
		if($perPage != $this->perPage)
			$this->perPage = $perPage;
		return Candidate::orderBy('firstname','ASC')->paginate($this->perPage);
	}
	
	public function getCandidate($id)
	{
		return Candidate::find($id);
	}
	
	public function getCandidateByCURP($curp)
	{
		return Candidate::where('curp',$curp)
						->first();
	}
	
	public function searchCandidates($text, $perPage)
	{
		if($perPage != $this->perPage)
			$this->perPage = $perPage;
		
		return Candidate::where('email', 'LIKE', '%'.$text.'%')
					->orWhereRaw("CONCAT(`firstname`,' ',`lastname`) LIKE ?",array('%'. $text.'%'))
					->orderBy('firstname', 'ASC')
					->paginate($this->perPage);
	}
	
	public function getCandidateInformation($candidate)
	{
		
		return Candidate::with('cenni_survey','applications')
						->find($candidate);
	}
	
}
