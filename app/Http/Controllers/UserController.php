<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\PasswordBroker;

use Illuminate\Http\Request;
use DTES\Repositories\UserRepo;

use DTES\Managers\NewUser;
use DTES\Managers\UpdateUser;
use App\Http\Controllers\Auth\PasswordController;

class UserController extends Controller {

	protected $userRepo;
	
	function __construct(UserRepo $userRepo, PasswordBroker $passwords)
	{
		$this->userRepo = $userRepo;
		$this->passwords = $passwords;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$token = \JWTAuth::getToken();
		
        $user = \JWTAuth::toUser($token);
		
		$users = $this->userRepo->getUsers($user->id);
		
		if($users->count())
			return response()->json(array('data' => $users), 200);
		
		return response()->json(array('msg' => 'No se encontraron resultados'), 422);
	}
	
	public function signinAdmin(Request $request) 
	{
		$credentials = $request->only('email','password');
		
		if(! $token = \JWTAuth::attempt($credentials))	
			return response()->json(false, 401);
		
		return response()->json(compact('token'),200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$data = $request->all();
		$data['password'] = '123456';
		
		$user = $this->userRepo->newUser();
		$manager = new NewUser($user, $data);
		
		if($manager->save())
		{
			
			
			$msg = '<p>Haz sido registrado al sitio de REDNOVA DTES.</p> Para personalizar tu contraseña de acceso';
			
			view()->composer('emails.password', function($view) use ($msg){
				$view->with(
					array('msg' => $msg)
				);
			});	
			
			$response = $this->passwords->sendResetLink(array('email' => $user->email), function($message){
				$message->from('jesussg251292@gmail.com','REDNOVA CONSULTANTS');
				$message->subject('REDNOVA DTES');
			});
			
			switch($response){
				case PasswordBroker::RESET_LINK_SENT:
					return response()->json(array('msg' => 'Usuario creado', 'user' => $user), 200);
				case PasswordBroker::INVALID_USER:
					return response()->json(array('msg' => 'El correo electrónico no se encuentra registrado'), 404);
			}			
		}
		
		return response()->json(array("errors" => $manager->getErrors()), 422);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_id)
	{
		//
		$user = $this->userRepo->getUser($user_id);
		
		if($user)
			return response()->json(array('data' => $user), 200);
			
		return response()->json(array('msg' => 'No se encontraron resutados'), 422);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $user_id)
	{
		//
		$user = $this->userRepo->getUser($user_id);
		$manager = new UpdateUser($user, $request->all());
		
		if($manager->save())
			return response()->json(array('msg' => 'Usuario actualizado', 'data' => $user), 200);
		
		return response()->json(array('errors' => $manager->getErrors()), 422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($user_id)
	{
		$user = $this->userRepo->getUser($user_id);
		
		if($user)
			if($user->delete())
				return response()->json(array('msg' => 'Usuario eliminado'));
			else
				return response()->json(array('msg' => 'Ocurrio un error. Intente más tarde'));
			
		return response()->json(array('msg' => 'No se encontró el usuario'));
	}
	
}
