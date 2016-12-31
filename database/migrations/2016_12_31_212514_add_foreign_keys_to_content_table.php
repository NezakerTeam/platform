<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content', function(Blueprint $table)
		{
			$table->foreign('lesson_id', 'content_ibfk_1')->references('id')->on('lesson')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('author_id', 'content_ibfk_2')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('content', function(Blueprint $table)
		{
			$table->dropForeign('content_ibfk_1');
			$table->dropForeign('content_ibfk_2');
		});
	}

}
