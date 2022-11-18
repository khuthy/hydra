<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quater extends Model
{
    use HasFactory;

    protected $fillable = [

        'quarter_name',
        'actual_results',
        'quater_name',
        'corporate_scorecard_indicator_id',
    ];


    public function quater()
    {
        return $this->belongsTo(CorporateScorecardIndicators::class, 'corporate_scorecard_indicator_id');
    }
}
