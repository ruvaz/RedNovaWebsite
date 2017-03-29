<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		// entities level 1
		$this->call('UsersTableSeeder');
		
		// $this->call('StatesTableSeeder');
		// $this->call('ProductsTableSeeder');
		// $this->call('OperatorsTableSeeder');
		
		//entities level 2
		// $this->call('ProductTypesTableSeeder'); // product versions
		// $this->call('CitiesTableSeeder');
		
		//entities level 3
		// $this->call('VenuesTableSeeder');
		
		//entities level 4
		// $this->call('ApplicationsTableSeeder');
		
		//entities level 5
		// $this->call('CandidatesTableSeeder');
	}

}
