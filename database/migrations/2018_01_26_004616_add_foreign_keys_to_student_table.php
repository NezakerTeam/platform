<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student', function(Blueprint $table)
		{
			$table->foreign('grade_id', 'student_ibfk_1')->references('id')->on('grade')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('education_type_id', 'student_ibfk_2')->references('id')->on('education_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student', function(Blueprint $table)
		{
			$table->dropForeign('student_ibfk_1');
			$table->dropForeign('student_ibfk_2');
		});
	}

}
