<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model {

	//
	protected $table = 'venues';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $fillable = array(
							'phone',
							'authorized_center',
							'address',
							'email',
							'school',
							'contact',
							'location',
							'status',
							'discount',
							'percentage',
							'initial_agreement_date',
							'final_agreement_date',
							'city_id',
							'state_id'
						);

	public function state()
	{
		return $this->belongsTo('DTES\Entities\State')->select(array('id','name'));
	}
	
	public function city(){
		return $this->belongsTo('DTES\Entities\City')->select(array('id','name'));	
	}
	
	public function applications()
	{
		return $this->hasMany('DTES\Entities\Application');
	}
}
