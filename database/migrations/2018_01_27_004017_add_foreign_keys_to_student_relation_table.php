<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentRelationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_relation', function(Blueprint $table)
		{
			$table->foreign('student_id', 'student_relation_ibfk_1')->references('id')->on('student')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'student_relation_ibfk_2')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_relation', function(Blueprint $table)
		{
			$table->dropForeign('student_relation_ibfk_1');
			$table->dropForeign('student_relation_ibfk_2');
		});
	}

}
