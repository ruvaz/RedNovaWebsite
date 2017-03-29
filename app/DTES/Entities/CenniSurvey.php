<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class CenniSurvey extends Model {

	protected $table = 'cenni_surveys';
	
	protected $dates = array('created_at','updated_at');
	
	protected $fillable = array(
							'actual_position',
							'current_profession',
							'disability',
							'experience_area',
							'handicapped',
							'how_learned_language',
							'indigenous',
							'indigenous_people',
							'institution',
							'level_academic_experience',
							'maximum_degree_studies',
							'motive',
							'previous_exam',
							'previous_exam_month',
							'previous_exam_year',
							'profession',
							'profession_area',
							'where_learned_language',
							'years_experience',
							'years_studying_language',
							'candidate_id'
						);
						
	public function candidate()
	{
		return $this->belongsTo('DTES\Entities\Candidate');
	}

}
