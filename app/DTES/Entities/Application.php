<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

use DTES\Entities\ProductType;

class Application extends Model {

	//
	protected $table = 'applications';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $appends = array('url','final_registration_timestamp','initial_registration_timestamp','application_timestamp');
		
	protected $fillable = array(							
							'total_candidates_classroom',
							'total_candidates',
							'registered_candidates',
							'type',
							'initial_registration_date',
							'final_registration_date',
							'application_date',
							'payment',
							'status',
							'uuid',
							'query_string_school',
							'exam_id',
							'product_id',
							'product_types',
							'operator_id',
							'venue_id'
						  );
	
	//relationships
	
	public function venue()
	{
		return $this->belongsTo('DTES\Entities\Venue')->select(array('id','school','state_id','city_id'));
	}		
	
	// get all data of a venue
	public function venue_data()
	{
		return $this->belongsTo('DTES\Entities\Venue','venue_id');
	}
	
	public function product_data()
	{
		return $this->belongsTo('DTES\Entities\Product','product_id');
	}
	
	public function product()
	{
		return $this->belongsTo('DTES\Entities\Product')->select(array('id','name','parents_information'));
	}
	
	public function operator()
	{
		return $this->belongsTo('DTES\Entities\Operator')->select(array('id','name'));
	}
	
	public function operator_data()
	{
		return $this->belongsTo('DTES\Entities\Operator','operator_id');
	}
	
	public function candidates()
	{
		return $this->belongsToMany('DTES\Entities\Candidate')
					->withPivot('application_id','candidate_id','registration_status','proof_payment','payment_method')
					->withTimestamps();
	}	
	
	
// 	candidates clasification

	public function candidates_pre_registration()
	{
		return $this->belongsToMany('DTES\Entities\Candidate')
					->wherePivot('registration_status',0)
					->withPivot('application_id','candidate_id','registration_status','proof_payment','payment_method','folio_me')
					->withTimestamps();
	}

	public function candidates_authorized_payment()
	{
		return $this->belongsToMany('DTES\Entities\Candidate')
					->wherePivot('registration_status',1)
					->withPivot('application_id','candidate_id','registration_status','proof_payment','payment_method','folio_me')
					->withTimestamps();
	}
	
	public function candidates_attendance()
	{
		return $this->belongsToMany('DTES\Entities\Candidate')
					->wherePivot('registration_status',2)
					->withPivot('application_id','candidate_id','registration_status','proof_payment','payment_method','folio_me')
					->withTimestamps();
	}
	
	public function candidates_non_attendance()
	{
		return $this->belongsToMany('DTES\Entities\Candidate')
					->wherePivot('registration_status',3)
					->withPivot('application_id','candidate_id','registration_status','proof_payment','payment_method','folio_me')
					->withTimestamps();
	}
	
//----------------------------------- 
	
	// mutators and accesors
	
	// timestamps for javascript
	public function getFinalRegistrationTimestampAttribute()
	{
		return Carbon::parse($this->attributes['final_registration_date'],'America/Mexico_City')->timestamp * 1000;
	}
	
	public function getInitialRegistrationTimestampAttribute()
	{		
		return Carbon::parse($this->attributes['initial_registration_date'],'America/Mexico_City')->timestamp * 1000; 
	}
	
	public function getApplicationTimestampAttribute()
	{
		return Carbon::parse($this->attributes['application_date'],'America/Mexico_City')->timestamp * 1000;
	}
	
	// real dates for website
	public function getFinalRegistrationDateAttribute($value)
	{
		return $this->attributes['final_registration_date'] = Carbon::parse($value)->format('d-m-Y H:i:s');
	}
	
	public function getInitialRegistrationDateAttribute($value)
	{
		return $this->attributes['initial_registration_date'] = Carbon::parse($value)->format('d-m-Y H:i:s');
	}
	
	public function getApplicationDateAttribute($value)
	{
		return $this->attributes['application_date'] = Carbon::parse($value)->format('d-m-Y H:i:s');
	}
	
	
	public function getUrlAttribute()
	{
		return $this->attributes['url'] = url();
	}

	public function getProductTypesAttribute($value)
	{			
		$productTypes = json_decode($value);
				
		return $this->attributes['product_types'] = ProductType::find($productTypes);					
	}

	public function getTypeAttribute($value)
	{
		if($value == 'open')
			return $this->attributes['type'] = 'ABIERTA';
		elseif($value == 'close')
			return $this->attributes['type'] = 'CERRADA';
	}
	
	public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists)
    {
        return new CandidateApplicationPivot($parent, $attributes, $table, $exists);
    }
	
	public function generateUUID($entropy, $id)
	{
		$s=uniqid("",$entropy);
	    $num= hexdec(str_replace(".","",(string)$s));
	    $index = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $base= strlen($index);
	    $out = '';
	        for($t = floor(log10($num) / log10($base)); $t >= 0; $t--) {
	            $a = floor($num / pow($base,$t));
	            $out = $out.substr($index,$a,1);
	            $num = $num-($a*pow($base,$t));
	        }
	    return strtoupper(dechex($id)).$out;
	}
}
