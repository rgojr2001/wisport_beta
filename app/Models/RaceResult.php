<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Racer;
use App\Models\WisportRacer;

class RaceResult extends Result
{
    protected $table = 'raceResults';

    public function season()
    {
        return $this->belongsTo(Season::class,Race::class);
    }

    public function racer()
    {
         return $this->belongsTo(Racer::class);
    }
}