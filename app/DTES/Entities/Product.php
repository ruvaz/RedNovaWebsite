<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $fillable = array(							
							'name',
							'parents_information',							
							'maximum_age',
							'minimum_age'
						  );
	
	//return all applications by product
	public function applications()
	{
		return $this->hasMany('DTES\Entities\Application');
	}
	
	
	// return open applications by product
	public function openApplications()
	{
		return $this->hasMany('DTES\Entities\Application')->where('type','=','open');
	}	
	
	public function types()
	{
		return $this->hasMany('DTES\Entities\ProductType')->select(array('id','name','price','product_id'));
	}
}
