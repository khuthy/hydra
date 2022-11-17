<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpOutcomeIndicators extends Model
{
    use HasFactory;

    protected $fillable = [
        'sp_scorecard_id',
        'mtsf_priority_id',
        'outcome_id',
        'outcome_output_indicator_id',
        'department_id',
        'baseline',
        'five_year_target',
        'progress'
    ];
        /**
     * @return BelongsTo
     * @description get the category for the blog post.
     */
    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function outcomeoutputindicator()
    {
        return $this->belongsTo(OutcomeOutputIndicators::class, 'outcome_output_indicator_id');
    }

    public function outcome()
    {
        return $this->belongsTo(Outcomes::class, 'outcome_id');
    }

    public function priority()
    {
        return $this->belongsTo(MtsfPriorities::class, 'mtsf_priority_id');
    }

    public function spscorecard()
    {
        return $this->belongsTo(SpScorecards::class, 'sp_scorecard_id');
    }


}
