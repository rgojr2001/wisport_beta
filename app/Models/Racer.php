<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class Racer extends Eloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first', 'last', 'age', 'agegroup_id', 'gender',
    ];

    public function season()
    {
        return $this->belongsTo('Season');
    }
}
