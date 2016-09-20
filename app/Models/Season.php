<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Race;

class Season extends Model
{
    protected $fillable = [
        'id',
        'year',
        'is_current_season',
    ];

    public function races()
    {
        return $this->hasMany(\App\Models\Race::class);
    }
}
