<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('application_candidate', function(Blueprint $table){
				
			$table->increments('id')->unsigned();
// 			
			$table->integer('registration_status')->unsigned();
			$table->integer('payment_method')->unsigned();
			$table->float('price');
			$table->string('proof_payment');
			$table->string('folio_me', 30);
			
			$table->integer('application_id')->unsigned()->index();
			$table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
			
			$table->integer('candidate_id')->unsigned()->index();
			$table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
			
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
		Schema::drop('application_candidate');
	}

}
