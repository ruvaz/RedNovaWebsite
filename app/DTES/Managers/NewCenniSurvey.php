<?php

namespace DTES\Managers;

class NewCenniSurvey extends BaseManager 
{
	public function getRules()
	{
		$rules = array(
			'indigenous' => 'required',
			'handicapped' => 'required',
			'motive' => 'required',
			'previous_exam' => 'required',
			'how_learned_language' => 'required',
			'where_learned_language' => 'required',
			'years_studying_language' => 'required',		
			'maximum_degree_studies' => 'required',			
			'profession_area' => 'required',
			'current_profession' => 'required',
			'level_academic_experience' => 'required',
			'experience_area' => 'required'
			
		);
		
		return $rules;
	}	
	
}
