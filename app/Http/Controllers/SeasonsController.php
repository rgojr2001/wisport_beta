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
        return Datatables::of(DB::table('processed_overall')
            ->join('races','races.id','=','processed_overall.race_id')
            ->select('short_name','place','first', 'last','gender','processed_overall.time','ag_label','ag_place'))->make(true);
    }
}
