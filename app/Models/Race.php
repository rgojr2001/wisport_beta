<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'event_id',
        'season_id',
        'date',
        'time',
        'name',
        'location',
        'short_name',
        'flyer_link',
        'course_map',
        'embedded_map',
        'contact_name',
        'contact_number',
        'contact_email',
        'about',
        'video_link',
        'website',
        'image',
        'logo',
    ];

    /**
     * A Race is part of a season
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function races()
    {
        return $this->belongsTo(\App\Models\Season::class);
    }

    public function event()
    {
        return $this->hasOne('\App\Models\Event');
    }

    public function results(){
        return $this->hasMany(\App\Models\RaceResult::class);
    }

    public function wisportResults(){
        return $this->hasMany(\App\Models\WisportResult::class);
    }

    public function racers(){
        return $this->hasMany(\App\Models\Racer::class);
    }

    public function wisportRacers(){
        return $this->hasMany(\App\Models\WisportRacer::class);
    }

    public function winners($gender){

        $results = \App\Models\Race::where('race_id',$this->id)->where('gender',$gender);
        dd($results);
        /*$winner = new Collection();
        $winner->push($results->wisportResults());*/
        #dd($this->wisportResults());
        foreach ($results->wisportResults as $rider){
             echo $rider[2];
        }
        #dd($winner);
        return;# $winner->push($this->wisportResults()->where('gender',$gender));
        #$winner = '';
    }
}
