<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentRelationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_relation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->index('student_id');
			$table->integer('user_id')->unsigned()->index('user_id');
			$table->integer('type_id')->unsigned();
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
		Schema::drop('student_relation');
	}

}
