<?php

namespace DTES\Repositories;

use DTES\Entities\CenniSurvey;
use Carbon\Carbon;

class CenniSurveyRepo extends \Eloquent {
	
	public function newCenniSurvey()
	{
		$cenni_survey = new CenniSurvey();
		$cenni_survey->created_at = Carbon::now('America/Mexico_City');
		$cenni_survey->updated_at = Carbon::now('America/Mexico_City');
		
		return $cenni_survey;
	}
}
