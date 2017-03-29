<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model {

	//
	protected $table = 'operators';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $fillable = array(
								'name',
								'phone',
								'address',
								'email'
							);

	public function applications()
	{
		return $this->hasMany('DTES\Entities\Application');	
	}
}
