<?php

namespace App;

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
    public function season()
    {
        return $this->belongsTo('App\Season');
    }
}
