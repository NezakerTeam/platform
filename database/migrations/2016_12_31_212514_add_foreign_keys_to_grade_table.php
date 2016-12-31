<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGradeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('grade', function(Blueprint $table)
		{
			$table->foreign('stage_id', 'FK_595AAE342298D193')->references('id')->on('stage')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('grade', function(Blueprint $table)
		{
			$table->dropForeign('FK_595AAE342298D193');
		});
	}

}
