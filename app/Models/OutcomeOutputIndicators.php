<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OutcomeOutputIndicators extends Model
{
    use HasFactory;


    protected $fillable = [
        'indicator_type',
        'indicator_title',
        'indicator_definition',
        'source_of_data',
        'method_of_calculation',
        'means_of_verification',
        'assumptions',
        'disagregation_of_benefitiaries',
        'spatial_transformation',
        'calculation_type',
        'reporting_cycle',
        'desired_performance',
        'indicator_responsibility',
    ];


    public function corporateScorecardIndicator()
    {
        return $this->hasMany(CorporateScorecardIndicators::class, 'ooi_id');
    }
}
