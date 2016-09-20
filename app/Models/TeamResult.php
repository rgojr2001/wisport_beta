<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamResult extends Model
{
    public function season()
    {
        return $this->belongsTo('Season');
    }
}
