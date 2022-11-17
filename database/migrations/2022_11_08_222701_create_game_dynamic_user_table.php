<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameDynamicUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_dynamic_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('game_dynamic_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('validate')->default(0);
            $table->timestamps();
            $table->foreign('game_dynamic_id')->references('id')->on('game_dynamics')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_dynamic_user');
    }
}
