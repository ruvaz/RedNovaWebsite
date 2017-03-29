<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenniSurveysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('cenni_surveys', function(Blueprint $table){
			
			$table->increments('id')->unsigned();
			$table->string('actual_position',200);
			$table->string('current_profession',200);
			$table->string('disability',200);
			$table->string('experience_area',200);
			$table->tinyInteger('handicapped');
			$table->string('how_learned_language',200);
			$table->tinyInteger('indigenous');			
			$table->string('indigenous_people');
			$table->string('institution',200);
			$table->string('level_academic_experience', 200);
			$table->string('maximum_degree_studies',200);
			$table->string('motive',50);
			$table->tinyInteger('previous_exam');
			$table->string('previous_exam_month',100);
			$table->integer('previous_exam_year');
			$table->string('profession',200);
			$table->string('profession_area',200);
			$table->string('where_learned_language',200);
			$table->integer('years_experience');
			$table->integer('years_studying_language');
			
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
		Schema::drop('cenni_surveys');
	}

}
