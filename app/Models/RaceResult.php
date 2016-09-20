<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceResult extends Model
{
    protected $table = 'processed_overall';

    public function season()
    {
        return $this->belongsTo(\App\Models\Season::class,\App\Models\Race::class);
    }
}