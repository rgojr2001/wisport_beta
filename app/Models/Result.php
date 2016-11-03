<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Result extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 
        'season_id',
        'racer_id',
        'wisportracer_id',
        'place',
        'age_group_place',
        'time',
        'racetype_id'
    ];

    public function season()
    {
        return $this->belongsTo('Season');
    }
}
