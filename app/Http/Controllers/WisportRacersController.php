<?php

namespace App\Http\Controllers;

use App\Models\WisportRacer;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class WisportRacersController extends RacersController
{
  
    public function show($wisport_id)
    {
        $wisport_user = WisportRacer::where('wisport_racer_id','=',$wisport_id)->get()->first();
        #dd($wisport_user);
        return view('auth/renewal',['wisportRacer' => $wisport_user]);
    }
    
    public function renew(Request $Request)
    {
        $data = $Request->all();
        
        $wisport_user = WisportRacer::where('wisport_racer_id','=',$data['wisport_id'])->get()->first();
        #dd($wisport_user->paid);
        if($wisport_user->paid)
        {
            return view('auth/renewal',['wisportRacer' => $wisport_user, 'errors' => 'You have already registered for the current season. Thank you for your support.']);
        }
        
        #dd($wisport_user);
        $wisport_user->team_id      = $data['team_id'];
        $wisport_user->paid         = 1;
        $wisport_user->save();

        // redirect
        //Session::flash('message', 'Successfully updated nerd!');
        return Redirect::to('/auth/payment');
    }

    public function getRaceResults($id){
        $wr = WisportRacer::find($id);
        #$wr = WisportRacer::where('paid','=','1')->with('wisportResults')->->get()->sortByDesc('wisportResults.overallPoints');
        #dd($wr);
        return view('standard/test',['wisportRacer' => $wr]);/*
        */
        
        #dd($all->get()->sortByDesc('wisportResults.overallPoints'));
    }
/*
    public function getWisportRaceResults($id){
        $wr = WisportRacer::find('WIO0004');
        return view('standard/test',['wisportRacer' => $wr]);
        #dd($wr->wisportResults());
        #dd(DB::table('raceResults')->where('wisport_racer_id','=',$wr->wisport_racer_id)->select('first','last','time')->get());
    }
*/
}
