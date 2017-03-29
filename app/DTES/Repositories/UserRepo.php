<?php 

namespace DTES\Repositories;

use DTES\Entities\User;

use Carbon\Carbon;
/**
 * 
 */
class UserRepo extends \Eloquent {
	
	public function newUser()
	{
		$user = new User();
		$user->created_at = Carbon::now('America/Mexico_City');
		$user->updated_at = Carbon::now('America/Mexico_City');
		return $user;
	}
	
	public function getUserByEmail($email)
	{
		return User::where('email',$email)->first();
	}
	
	public function getUsers($current_user_id)
	{		
		return User::where('id', '!=', $current_user_id)
				   ->get();
	}
	
	public function getUser($user_id)
	{
		return User::find($user_id);
	}
}
