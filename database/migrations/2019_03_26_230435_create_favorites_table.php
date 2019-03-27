<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_favorites', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('favorited_user_id')->index();
            $table->foreign('favorited_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['user_id', 'favorited_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_favorites');
    }
}
