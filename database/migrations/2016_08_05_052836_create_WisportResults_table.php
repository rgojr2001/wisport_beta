<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisportResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('wisport_results')) 
        {
            Schema::create('wisport_results', function (Blueprint $table) {
                $table->increments('wisport_result_id');
                $table->integer('wisport_racer_id');
                $table->integer('race_id');
                $table->integer('points');
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
        //
    }
}
