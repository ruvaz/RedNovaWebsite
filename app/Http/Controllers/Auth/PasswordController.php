<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;	
	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
	
	public function postEmail($email)
	{
		
		$msg = 'Para restaurar tu contraseña de acceso';
		
		view()->composer('emails.password', function($view) use ($msg){
			$view->with(
				array('msg' => $msg)
			);
		});		
							
		$response = $this->passwords->sendResetLink(array('email'=>$email), function($message){
			$message->from('jesussg251292@gmail.com','REDNOVA CONSULTANTS');
			$message->subject('Restaurar contraseña');
		});
		
		switch($response){
			case PasswordBroker::RESET_LINK_SENT:
				return;
			case PasswordBroker::INVALID_USER:
				return response()->json(array('msg' => 'El correo electrónico no se encuentra registrado'), 404);
		}		
	}		
	
	public function resetForm($email,$token){
		return view('auth.reset')->with('token',$token)->with('email',$email);
	}
	
	public function postReset(Request $request)
	{
		$this->validate($request, array(
			       'token' => 'required',
			       'email' => 'required|email',
			       'password' => 'required|confirmed'
	    		)
		);
		
		$credentials = $request->only('email','password', 'password_confirmation', 'token');								
						
		$response = $this->passwords->reset($credentials, function($user, $password){
			$user->password = $password;
			$user->save();
		});
		
		switch($response)
		{
			case PasswordBroker::PASSWORD_RESET:
				return response()->json(array('msg' => 'Contraseña actualizada'), 200);
			case PasswordBroker::INVALID_TOKEN:
				return response()->json(array('error' => 'Token no válido'), 422);
            case PasswordBroker::INVALID_USER:
				response()->json(array('error' => 'Usuario no válido'), 422);
			default:
				return response()->json(array('error' => \Lang::get($response)), 422);
		}
	}		
}
