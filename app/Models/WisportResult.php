<?php

namespace App\Models;

use App\Models\Racer;
use Illuminate\Database\Eloquent\Model;
use App\Models\Result;

class WisportResult extends Result
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'points',
        'wisport_age_group_place',
    ];

    protected $table = 'wisportResults';

    protected $primaryKey = 'wisport_points_id';

    public function wisportRacer(){
        return $this->hasOne(WisportResult::class);
    }

    public function Race(){
        return $this->belongsTo(Race::class);
    }

}
