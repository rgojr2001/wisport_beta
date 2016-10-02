<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

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
