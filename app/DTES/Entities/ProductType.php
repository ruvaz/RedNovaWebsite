<?php namespace DTES\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model {

	//
	protected $table = 'product_types';
	
	protected $dates = array('created_at', 'updated_at');
	
	protected $fillable = array(
							'name',
							'price',
							'paypal_code',
							'product_id',													
						  );
						  
	public function product()
	{
		return $this->belongsTo('DTES\Entities\Product');
	}	

}
