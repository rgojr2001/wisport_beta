<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
    }

    //
    public function races()
    {
        return $this->hasMany('App\Race');
    }
}
