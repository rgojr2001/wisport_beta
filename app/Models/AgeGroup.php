<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lower', 'upper','label','letter_id'
    ];

}
