<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Models\Race;
use \App\Models\Season;

class SeasonsController extends Controller
{
    public function index()
    {
        return view('standard.index');
    }

    public function schedule()
    {

        $season = new \App\Models\Season;

        $season->races = \DB::table('races')->where('season_id','2016')->get();

        #$season = \DB::table('races')->where('season_id',2016)->get();
        return view('standard.schedule', ['schedule' => $season]);
    }
}
