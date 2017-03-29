<?php namespace DTES\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = array(
							'firstname',
							'lastname',
							'email',
							'password',
							'role'
						);
	
	protected $dates = array('created_at', 'updated_at');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function setPasswordAttribute($value)
	{
		if( !empty($value))
			$this->attributes['password'] = \Hash::make($value);
	}
	
	public function getCreatedAtAttribute($value)
	{
		return $this->attributes['created_at'] = Carbon::parse($value,'America/Mexico_City')->timestamp * 1000;
	}

}
