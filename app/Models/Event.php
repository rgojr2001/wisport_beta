<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [   //
        'name',
        'short_name',
        'location',
        'map_link',
    ];

    public function races(){
        return $this->hasMany(\App\Models\Race::class);
    }

    public function seasons(){
        return $this->hasMany(\App\Models\Season::class);
    }
}
