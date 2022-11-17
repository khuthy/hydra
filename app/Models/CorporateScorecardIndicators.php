<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CorporateScorecardIndicators extends Model
{
    use HasFactory;




        /**
     * @return BelongsTo
     * @description get the category for the blog post.
     */
    public function Programme(): HasOne
    {
        return $this->belongsTo(Programmes::class, 'programme_id');
    }

    public function getIndicators(): HasOne
    {
        return $this->belongsTo(OutcomeOutputIndicator::class, 'ooi_id');
    }
}
