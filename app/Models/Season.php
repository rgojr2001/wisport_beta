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
        return $standings_table;
    }
}
