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
            $table->foreign('user')
                ->references('user')->on('rests')
                ->onDelete('cascade');
            $table->unsignedInteger('rest_id');
            $table->foreign('rest_id')
                ->references('id')->on('rests')
                ->onDelete('cascade');
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
        Schema::dropIfExists('likes');
    }
}
