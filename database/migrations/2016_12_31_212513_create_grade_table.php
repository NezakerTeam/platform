<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grade', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('stage_id')->index('IDX_595AAE342298D193');
			$table->string('name');
			$table->text('description', 65535);
			$table->boolean('status');
			$table->timestamps();
			$table->smallInteger('ordering');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grade');
	}

}
