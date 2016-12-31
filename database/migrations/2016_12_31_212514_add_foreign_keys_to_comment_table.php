<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			$table->foreign('thread_id', 'FK_9474526CE2904019')->references('id')->on('thread')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('author_id', 'FK_9474526CF675F31B')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('comment', function(Blueprint $table)
		{
			$table->dropForeign('FK_9474526CE2904019');
			$table->dropForeign('FK_9474526CF675F31B');
		});
	}

}
