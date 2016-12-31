<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stage', function(Blueprint $table)
		{
			$table->integer('id', true);
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
		Schema::drop('stage');
	}

}
