<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CorporateScorecardIndicators extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'ooi_id',
        'output',
        'means_of_verification',
        'responsibility',
        'frequency',
        'status_of_assessment',
        'reason_for_deviation',
        'corrective_action',
        'calculation_type'

    ];



    public function programme()
    {
        return $this->belongsTo(Programmes::class, 'programme_id');
    }

    public function outcomeoutputindicator()
    {
        return $this->belongsTo(Indicators::class, 'ooi_id');
    }

    public function quater()
    {
        return $this->hasMany(Quater::class, 'corporate_scorecard_indicator_id');
    }
}
