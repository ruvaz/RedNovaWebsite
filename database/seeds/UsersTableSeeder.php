<?php

use Illuminate\Database\Seeder;

use DTES\Entities\User;

/**
 * 
 */
class UsersTableSeeder extends Seeder 
{
	public function run()
	{
		
		//administrators
		User::create(
			array(
				'firstname' => 'EFRAIN',
				'lastname' => 'MERCADO',
				'email' => 'emercado@grupomacmillan.com',
				'password' => '123456',
				'role' => 'ADMINISTRATOR'			
			)
		);
		
		// User::create(
			// array(
				// 'firstname' => 'LUIS',
				// 'lastname' => 'DOMINGUEZ',
				// 'email' => 'LDOMINGUEZ@GRUPOMACMILLAN.COM',
				// 'password' => '123456',
				// 'role' => 'ADMINISTRATOR'				
			// )
		// );
		
		// User::create(
			// array(			
				// 'firstname' => 'Efraín',
				// 'lastname' => 'Mercado',
				// 'email' => 'emarcado@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'administrator'
			// )
		// );
// 		
		// // coordinator
		// User::create(
			// array(
				// 'firstname' => 'Nataly',
				// 'lastname' => 'Nataly',
				// 'email' => 'nataly@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'coordinator'
			// )
		// );
// 				
		// // oral examinator
// 		
		// User::create(
			// array(
				// 'firstname' => 'Gaby',
				// 'lastname' => 'Ladrón',
				// 'email' => 'gaby@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'oral_examinator'
			// )
		// );
// 						
		// // grader
		// User::create(
			// array(
				// 'firstname' => 'Luis', 
				// 'lastname' => 'Eisemberg',
				// 'email' => 'luis@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'grader'
			// )
		// );			
// 		
		// // supervisor
// 		
		// User::create(
			// array(
				// 'firstname' => 'Jaqui',
				// 'lastname' => 'Jaqui',
				// 'email' => 'jaqui@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'supervisor'
			// )
		// );
// 		
		// // capturista
		// User::create(
			// array(
				// 'firstname' => 'Capturista',
				// 'lastname' =>  'Capturista',
				// 'email' => 'capturista@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'catcher'
			// )
		// );
// 		
		// // invigilator
		// User::create(
			// array(
				// 'firstname' => 'Invigilator',
				// 'lastname' => 'Invigilator',
				// 'email' => 'invigilator@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'invigilator'
			// )
		// );
// 		
		// // usher
		// User::create(
			// array(
				// 'firstname' => 'Usher',
				// 'lastname' => 'Usher',
				// 'email' => 'usher@grupomacmillan.com',
				// 'password' => '123456',
				// 'role' => 'usher'
			// )
		// );
	}			
}

