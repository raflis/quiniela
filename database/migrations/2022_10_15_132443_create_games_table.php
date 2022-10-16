<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team1_id')->unsigned();
            $table->bigInteger('team2_id')->unsigned();
            $table->integer('score');
            $table->timestamps();

            $table->foreign('team1_id')->references('id')->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')
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
        Schema::dropIfExists('games');
    }
}
