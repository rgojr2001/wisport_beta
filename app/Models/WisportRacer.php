<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;

class WisportRacer extends Racer
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'password',
        'wisport_racer_id',
        'dob',
        'team_id',
        'paid'
    ];


    public function user(){
        return $this->belongsTo('User');
    }


}
