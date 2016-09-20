<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class User extends Controller
{

    private function set_wisport_id($letter)
    {
        $wisport_id =  \App\Models\User::where('wisportId', 'like', 'WI'.$letter.'%')
            ->orderBy('wisportId','DESC')
            ->limit(1)
            ->first();
        return ++$wisport_id->wisportId;
    }

    private function set_age_group($month,$year){
        $wisport_age = get_wisport_age($month,$year);
        $age_id =  \App\Models\AgeGroup::where('upper', '>', $wisport_age)
            ->where('lower', '<', $wisport_age)
            ->get();
        return $age_id->age_group_id;
    }

    private function get_wisport_age($m,$y){
        $wisport_month = 6;
        $wisport_year = 2017;
        $age = $wisport_year-$y;
        return ($m > $wisport_month) ? $age : $age-1;
    }
}
