<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('race_results')) 
        {
            Schema::create('race_results', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('racer_id');
                $table->integer('race_id');
                $table->integer('place');
                $table->integer('age_group_place');
                $table->string('time');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('raceResults');
    }
}
