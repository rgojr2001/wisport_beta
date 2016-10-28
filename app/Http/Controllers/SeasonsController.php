<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Models\Race;
use \App\Models\Season;
use \App\Models\RaceResult;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class SeasonsController extends Controller
{
    public function schedule()
    {

        $season = new \App\Models\Season;

        $season->races = \DB::table('races')->where('season_id','2016')->get();

        #$season = \DB::table('races')->where('season_id',2016)->get();
        return view('standard.schedule', ['schedule' => $season]);
    }
    
    public function getIndex(){
        return view('seasons.index');
    }
    
    public function anyData(){
        return Datatables::of(DB::table('race_results')
            ->join('races','races.id','=','race_results.race_id')
            ->join('age_groups','race_results.age_group_id','=','age_groups.age_group_id')
            ->select('races.date','short_name','place','first', 'last','gender','race_results.time','age_groups.label','age_group_place')
        )->make(true);
    }

    public function getOverallStandings(){
        return view('seasons.overall');
    }

    public function anyOverallStandingsData(){
        $season = new Season();
        $s = $season->sortOverallStandings();
        #dd($s);
        return Datatables::of($s)->make(true);
    }

    public function getAgeGroupStandings(){
        return view('seasons.ageGroup');
    }
    
    public function anyAgeGroupStandingsData(){
        $season = new Season();
        $s = $season->sortAgeGroupStandings();
        #dd($s);
        return Datatables::of($s)->make(true);
    }

    public function leaderboard(){
        $season = new Season();
        return view('seasons.leaderboard',['leaders' => $season->getLeaderboard()]);
    }
}
