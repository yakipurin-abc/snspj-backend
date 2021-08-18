<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->bigInteger('rest_id')->unsigned();
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rest_id')->references('id')->on('rests')->onDelete('cascade');

            $table->unique(['user', 'rest_id']);
        });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
