<?php
/**
 * Created by PhpStorm.
 * User: RJ
 * Date: 9/15/2016
 * Time: 8:54 PM
 */
use Illuminate\Database\Eloquent\Collection;

function set_wisport_id($letter)
{
    #dd($letter);
    $wisport_id =  App\User::where('wisportId', 'like', 'WI'.$letter.'%')
        ->orderBy('wisportId','DESC')
        ->limit(1)
        ->first();
    #dd(++$wisport_id->wisportId);
    if($wisport_id)
    {
        return ++$wisport_id->wisportId;
    }
    else{
        return 'WI'.strtoupper($letter).'0001';
    }


}

function set_age_group($month,$year){
    $wisport_age = get_wisport_age($month,$year);
    #echo $month.' ',$year;
    #dd($wisport_age);
    $age_id =  \App\App\Models\AgeGroup::where('upper', '>=', $wisport_age)
        ->where('lower', '<=', $wisport_age)
        ->first();
    #dd($age_id);
    return $age_id->age_group_id;
}

function get_wisport_age($m,$y){
    $wisport_month = 6;
    $wisport_year = 2017;
    $age = $wisport_year-$y;
    return ($m > $wisport_month) ? $age : $age-1;
}


function getOverallLeaders(){
    $raw_male = \App\Models\WisportRacer::where('paid','=','1')->
            where('gender','=','M')->with('wisportResults')->get();
    $raw = new Collection();
    $temp_male = new Collection();
    $temp_female = new Collection();
    $final = new Collection();
    foreach($raw_male as $season_total){
        if($season_total->wisportResults->sum('points')>0){
            $raw->push([
                'first'         => $season_total->first_name,
                'last'          => $season_total->last_name,
                'gender'        => $season_total->gender,
                'competition'   => 'Overall Points',
                'points'        => $season_total->wisportResults->sum('points')
            ]);
        }
    }
    $raw = $raw->sortByDesc(['points']);
    $temp_male = $raw->first();

    $raw_female = \App\Models\WisportRacer::where('paid','=','1')->
                where('gender','=','F')->with('wisportResults')->get();
    $raw = new Collection();

    foreach($raw_female as $season_total){
        if($season_total->wisportResults->sum('points')>0){
            $raw->push([
                'first'         => $season_total->first_name,
                'last'          => $season_total->last_name,
                'gender'        => $season_total->gender,
                'competition'   => 'Overall Points',
                'points'        => $season_total->wisportResults->sum('points')
            ]);
        }
    }
    $raw = $raw->sortByDesc(['points']);
    $temp_female = $raw->first();
    #$temp = array_($temp_female,$temp_male);
    $final = $final->push($temp_male);
    $final = $final->push($temp_female);
    return $final;
}

function getWorldsWinners($gender = null){

}

function getTeamWinners($gender = null){

}

function getFastestWinners($gender = null){

}
?>