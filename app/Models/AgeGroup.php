<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lower', 'upper','label','letter_id'
    ];

    protected $primaryKey  = 'age_group_id';

    public function label(){
        return $this->label;
    }
}
