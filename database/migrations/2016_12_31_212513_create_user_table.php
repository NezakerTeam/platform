<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function(Blueprint $table) {
            $table->integer('id', true)->unsigned();
            $table->string('username', 180);
            $table->string('email', 180);
            $table->boolean('status');
            $table->string('password');
            $table->dateTime('last_login');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->smallInteger('gender');
            $table->string('photo_name')->nullable();
            $table->string('address')->nullable();
            $table->integer('city_id')->nullable()->index('IDX_8D93D6498BAC62AF');
            $table->longText('phone_numbers');
            $table->integer('type');
            $table->rememberToken();
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
        Schema::drop('user');
    }
}
