<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('venues', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('phone',50);
			$table->string('address',255);
			$table->tinyInteger('authorized_center');
			$table->string('email',50);
			$table->string('school',255);
			$table->string('contact',255);
			$table->string('location',500);
			$table->tinyInteger('status');
			$table->tinyInteger('discount');
			$table->integer('percentage')->nullable();
			$table->date('initial_agreement_date')->nullable();
			$table->date('final_agreement_date')->nullable();
						
			$table->integer('city_id')->unsigned()->index();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
			
			$table->integer('state_id')->unsigned()->index();
			$table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
			
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
		Schema::drop('venues');
	}

}
