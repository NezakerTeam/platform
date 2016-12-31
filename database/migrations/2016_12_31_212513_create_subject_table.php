<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subject', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('grade_id')->index('IDX_FBCE3E7AFE19A1A8');
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
		Schema::drop('subject');
	}

}
