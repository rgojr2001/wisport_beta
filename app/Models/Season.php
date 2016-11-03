<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Race;

class Season extends Model
{
    protected $fillable = [
        'id',
        'year',
        'is_current_season',
    ];

    public function races()
    {
        return $this->hasMany(\App\Models\Race::class);
    }

    public function wisport_racers()
    {
        return $this->hasMany(\App\Models\WisportRacer::class);
    }

    public function wisportResults(){
        return $this->hasMany(\App\Models\WisportResult::class);
    }

    public function teamResults(){
        return $this->hasMany(\App\App\Models\TeamResult::class);
    }

    public function sortOverallStandings(){
        $s = WisportRacer::where('paid','=','1')->with('wisportResults')->get();
        $standings_table = new Collection();
        foreach($s as $season_total){
            $agLabel = AgeGroup::find($season_total->age_group_id);
            if($season_total->wisportResults->sum('points')>0){
                $standings_table->push([
                    'first'     => $season_total->first_name,
                    'last'      => $season_total->last_name,
                    'gender'    => $season_total->gender,
                    'ag_label'  => $agLabel['label'],
                    'points'    => $season_total->wisportResults->sum('points')
                ]); 
            }
        }
        return $standings_table->sortByDesc(['gender','points']);
    }

    public function sortAgeGroupStandings(){
        $s = WisportRacer::where('paid','=','1')
                            ->with('wisportResults')->get();
        $standings_table_tt = new Collection();

        foreach($s as $season_total){
            $agLabel = AgeGroup::find($season_total->age_group_id);
            #($season_total->ttPoints());
            if($season_total->ttPoints()>0){
                $standings_table_tt->push([
                    'first'         => $season_total->first_name,
                    'last'          => $season_total->last_name,
                    'gender'        => $season_total->gender,
                    'ag_label'      => $agLabel['label'],
                    'competition'   => 'TT',
                    'points'        => $season_total->ttPoints()
                ]);
            }
        }
        
        foreach($s as $season_total){
            $agLabel = AgeGroup::find($season_total->age_group_id);
            if($season_total->rrPoints()>0){
                $standings_table_tt->push([
                    'first'     => $season_total->first_name,
                    'last'      => $season_total->last_name,
                    'gender'    => $season_total->gender,
                    'competition'   => 'RR',
                    'ag_label'  => $agLabel['label'],
                    'points'    => $season_total->rrPoints()
                ]);
            }
        }

        $tt = $standings_table_tt->sortBy(function($standings_table_tt) {
            return sprintf('%-12s%s',$standings_table_tt['gender'], $standings_table_tt['competition'], $standings_table_tt['ag_label'], $standings_table_tt['points']);
        });

        return $tt;
    }


    public function getLeaderboard(){

        $leaderboard = new Collection();
        $leaderboard_ov = getOverallLeaders();
        $leaderboard_ww = getWorldsWinners();
        dd($leaderboard_ww);
        $leaderboard->push($leaderboard_ov)->push($leaderboard_ww);
        return $leaderboard;
    }
}
