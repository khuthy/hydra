<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpScorecards extends Model
{
    use HasFactory;

    protected $fillable = [
        'strategic_year'
    ];

    public function spoutcomeindicator()
    {
        return $this->hasMany(SpOutcomeIndicators::class, 'sp_scorecard_id');
    }


    public function corporatescorecard()
    {
        return $this->hasMany(CorporateScorecards::class, 'sp_scorecard_id');
    }


}
