<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Racer;
use App\Models\Result;
use App\Models\WisportResult;
use App\Models\RaceResult;

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

    public static function create(array $data = array())
    {
        #dd($data);
        $birthday = new \DateTime($data['birth_date']);
        $month = $birthday->format('m');
        $year = $birthday->format('Y');
        #dd(set_age_group($month,$year));
        #dd(substr($data['last_name'], 0,1));
        $wisport_racer = new WisportRacer();
        $wisport_racer->user_id=$data['user_id'];
        $wisport_racer->first_name=$data['first_name'];
        $wisport_racer->last_name=$data['last_name'];
        $wisport_racer->wisport_racer_id=$data['wisport_racer_id'];
        $wisport_racer->gender=$data['gender'];
        $wisport_racer->team_id=$data['team'];
        $wisport_racer->phone=$data['phone'];
        $wisport_racer->dob=date('Y-m-d', strtotime($data['birth_date']));
        $wisport_racer->age_group_id=set_age_group($month,$year);
        //$user->store;
        $wisport_racer->save();
        #dd($wisport_racer);
        return $wisport_racer;
    }

    public function results(){
        return $this->hasMany(RaceResult::class);
    }

    public function ageGroup(){
        return $this->hasOne(AgeGroup::class);
    }
    
    public function wisportResults(){
        return $this->hasMany(WisportResult::class);
    }

    public function overallPoints(){
        return $this->wisportResults->sum('points');
    }

    public function ttPoints(){
        return $this->wisportResults->where('race_type','TT')->sortByDesc('points')->take(5)->sum('points');
    }

    public function rrPoints(){
        return $this->wisportResults->where('race_type','RR')->sortByDesc('points')->take(5)->sum('points');
    }
}
