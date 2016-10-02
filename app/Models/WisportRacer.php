<?php

namespace App\App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Racer;

class WisportRacer extends Racer
{
    public $primaryKey = 'wisport_racer_id';
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

    public $incrementing = false;

    public function user(){
        return $this->belongsTo('User');
    }


}
