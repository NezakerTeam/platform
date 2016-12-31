<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subject', function(Blueprint $table)
		{
			$table->foreign('grade_id', 'FK_FBCE3E7AFE19A1A8')->references('id')->on('grade')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subject', function(Blueprint $table)
		{
			$table->dropForeign('FK_FBCE3E7AFE19A1A8');
		});
	}

}
