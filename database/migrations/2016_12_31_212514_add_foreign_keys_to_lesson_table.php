<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLessonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lesson', function(Blueprint $table)
		{
			$table->foreign('subject_id', 'FK_F87474F323EDC87')->references('id')->on('subject')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lesson', function(Blueprint $table)
		{
			$table->dropForeign('FK_F87474F323EDC87');
		});
	}

}
