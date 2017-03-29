<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

	//
	protected $table = 'states';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $fillable = array('name');


	public function cities()
	{
		return $this->hasMany('DTES\Entities\City')
					->orderBy('name','ASC');
	}

	public function venues()
	{
		return $this->hasMany('DTES\Entities\Venue')
					->orderBy('school','Asc');
	}
	
	public function authorized_center()
	{
		return $this->hasMany('DTES\Entities\Venue')
					->where('authorized_center',1)
					->select(array('state_id',
								   'city_id',
								   'school',
								   'contact',
								   'email',
								   'phone',
								   'address'))			
					->orderBy('school','Asc');
	}
	
}
