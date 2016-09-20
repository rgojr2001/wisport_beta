<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use \App\Models\User;
use \App\Models\Race;

class PagesController extends Controller
{
    public function index()
    {
        return view('standard.index');
    }
    
    public function test_page()
    {

        $season = new \App\Models\Season;
        $season->races = \DB::table('races')->where('season_id',$season->year)->get();
        #$season = \DB::table('races')->where('season_id',2016)->get();
        return view('standard.test', ['schedule' => $season]);
    }
}
