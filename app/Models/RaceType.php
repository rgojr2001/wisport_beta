<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'enum',
   ];
}
