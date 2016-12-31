<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lesson_id')->index('subject_id');
			$table->integer('author_id')->index('author');
			$table->text('description', 65535);
			$table->smallInteger('status');
			$table->smallInteger('type');
			$table->timestamps();
			$table->text('youtube_video_id', 65535)->nullable();
			$table->text('material_url', 65535);
			$table->text('thumbnail')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content');
	}

}
