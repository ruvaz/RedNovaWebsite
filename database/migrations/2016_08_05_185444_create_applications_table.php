<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
		 
	public function up()
	{
		Schema::create('applications', function(Blueprint $table)
		{
			$table->increments('id');			
			
			$table->integer('total_candidates_classroom');
			$table->integer('total_candidates');
			$table->integer('registered_candidates');
						
			$table->enum('type', array('open', 'close'));
			$table->dateTime('initial_registration_date');
			$table->dateTime('final_registration_date');
			$table->dateTime('application_date');			
			
			$table->tinyInteger('payment');
			$table->tinyInteger('status');
			$table->string('uuid');
			$table->string('query_string_school');
			
			$table->integer('venue_id')->unsigned()->index();
			$table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
			
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			
			$table->string('product_types',500);
			
			$table->integer('operator_id')->unsigned();
			$table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
			
			$table->integer('exam_id')->unsigned();
			
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
		Schema::drop('applications');
	}

}
