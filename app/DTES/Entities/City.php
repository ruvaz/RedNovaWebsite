<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

	//
	protected $table = 'cities';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $fillable = array('name','state_id');
	
	public function state()
	{
		return $this->belongsTo('DTES\Entitites\State');
	}
	
	public function venues()
	{
		return $this->hasMany('DTES\Entities\Venue')->orderBy('school','Asc');
	}
}
