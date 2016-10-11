<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('race_types')) 
        {
            Schema::create('race_types', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('race_type', ['CL', 'RR', 'TT', 'TR', 'TDLV']);
                $table->string('label');
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
        Schema::drop('raceTypes');
    }
}
