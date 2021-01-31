<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('user_id')->references('id')->on('users')->onDelete('cascade')->comment('いいねするユーザーID');
            $table->unsignedInteger('tweet_id')->references('id')->on('tweets')->onDelete('cascade')->comment('いいねされるツイートID');

            $table->unique([
                'user_id',
                'tweet_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
