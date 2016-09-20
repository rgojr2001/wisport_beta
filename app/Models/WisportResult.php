<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
