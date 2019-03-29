<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->nullable(false);
            $table->string('surname', 50)->nullable(false);
            //$table->string('login', 50)->nullable(false);
            $table->string('email', 320)->nullable(false)->unique();
            $table->string('password', 255)->nullable(false);
            $table->string('description', 500)->nullable(false);
            $table->string('avatar')->nullable(false);
            $table->rememberToken();
        });

        Schema::create('artist_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('city_id')->index();
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');

            $table->integer('street_number')->nullable(false);
            $table->text('street')->nullable(false);
            $table->text('postcode')->nullable(false);
            $table->unsignedSmallInteger('rating')->nullable();

            //$table->primary('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('artist_users');
    }
}
