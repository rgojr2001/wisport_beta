<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Racer;
use App\Models\WisportRacer;

class RaceResult extends Result
{
    protected $table = 'race_results';

    public function season()
    {
        return $this->belongsTo(Season::class,Race::class);
    }

    public function racer()
    {
         return $this->belongsTo(Racer::class);
    }

    public function wisportRacer()
    {
        return $this->belongsTo(WisportRacer::class);
    }
}