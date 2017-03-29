<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;
use DTES\Entities\CandidateApplicationPivot;

use Carbon\Carbon;

class Candidate extends Model {

	//
	protected $table = 'candidates';
	
	protected $dates = array('created_at', 'updated_at');

	protected $fillable = array(
							'authorized_persons',
							'birthdate',
							'birthplace_state',
							'city',
							'colony',
							'curp',
							'cp',
							'email',
							'firstname',
							'genere',
							'lastname',
							'n_exterior',
							'n_interior',
							'nationality',
							'phone',
							'state',
							'street',
							'town',
							'tutor'
						);
	
	//relationships		
	public function cenni_survey()
	{
		return $this->hasOne('DTES\Entities\CenniSurvey');
	}
	
	public function applications()
	{
		return $this->belongsToMany('DTES\Entities\Application')
					->orderBy('application_date')
					->withTimestamps();
	}
	
	public function last_applications()
	{
		return $this->belongsToMany('DTES\Entities\Application')
					->withPivot('candidate_id','application_id')
					->where('registration_status','<=',2)
					->orderBy('application_date', 'desc')
					->take(1);
	}
			
	public function check_previous_registration($application_id)
	{
		return $this->belongsToMany('DTES\Entities\Application')
					->withPivot('candidate_id','application_id')
					->wherePivot('application_id',$application_id)
					->count();
	}

	public function application($application_id)
	{
		return $this->belongsToMany('DTES\Entities\Application')					
					->with('venue_data.city')					
					->with('venue_data.state')
					->with('product')
					->withPivot('candidate_id',
								'application_id',
								'registration_status',
								'payment_method',
								'folio_me',								
								'proof_payment',
								'created_at')
					->where('application_id',$application_id)
					->first();
	}
	
	public function setAuthorizedPersonsAttribute($value)
	{
		$this->attributes['authorized_persons'] = json_encode($value);
	}
	
	public function getAuthorizedPersonsAttribute($value)
	{
		return $this->attributes['authorized_persons'] = json_decode($value);
	}

	public function getGenereAttribute($value)
	{
		if($value == 'male')
			return $this->attributes['genere'] = 'HOMBRE';
		elseif($value == 'female')
			return $this->attributes['genere'] = 'MUJER';
	}

	public function getBirthdateAttribute($value)
	{
		return $this->attributes['birthdate'] = Carbon::parse($value, 'America/Mexico_City')->timestamp * 1000;
	}
	
	public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists)
    {
        return new CandidateApplicationPivot($parent, $attributes, $table, $exists);
    }	
}
