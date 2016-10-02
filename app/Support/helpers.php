<?php
/**
 * Created by PhpStorm.
 * User: RJ
 * Date: 9/15/2016
 * Time: 8:54 PM
 */

function set_wisport_id($letter)
{
    #dd($letter);
    $wisport_id =  App\User::where('wisportId', 'like', 'WI'.$letter.'%')
        ->orderBy('wisportId','DESC')
        ->limit(1)
        ->first();
    #dd(++$wisport_id->wisportId);
    return ++$wisport_id->wisportId;
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

?>