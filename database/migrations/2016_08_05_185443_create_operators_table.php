<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('operators',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',100);
			$table->string('phone');
			$table->string('email',50);
			$table->string('address',100);
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
		Schema::drop('operators');
	}

}
