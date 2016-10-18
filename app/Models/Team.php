<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    public function wisport_racers(){
        $this->hasMany(\App\Models\WisportRacers::class);
    }
}
