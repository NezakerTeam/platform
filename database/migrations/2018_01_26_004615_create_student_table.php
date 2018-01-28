<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('education_type_id')->index('education_type_id');
            $table->integer('grade_id')->index('grade_id');
            $table->boolean('gender');
            $table->date('birthdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student');
    }
}
