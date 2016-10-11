<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRacersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('racers')) 
        {
            Schema::create('racers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first');
                $table->string('last');
                $table->integer('age');
                $table->integer('age_group_id');
                $table->enum('gender', ['M', 'F']);
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
        Schema::drop('racers');
    }
}
