<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		
		Schema::create('candidates', function(Blueprint $table){
			
			$table->increments('id')->unsigned();
			$table->string('authorized_persons',200);
			$table->date('birthdate');
			$table->string('birthplace_state',20);
			$table->string('city',30);
			$table->string('colony',40);
			$table->string('cp',8);
			$table->string('curp',18)->unique();
			$table->string('email',30);
			$table->string('firstname');
			$table->enum('genere',['female','male']);
			$table->string('lastname',50);
			$table->string('n_exterior',10);
			$table->string('n_interior',10)->nullable();
			$table->string('nationality',20);
			$table->string('phone',20);
			$table->string('state',30);
			$table->string('street',100);
			$table->string('town',100);
			$table->string('tutor',100)->nullable();
			
			$table->timestamps();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('candidates');
	}

}
