<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OutcomeOutputIndicators extends Model
{
    use HasFactory;

          /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function CorporateScorecardIndicators(): BelongsTo
    {
        return $this->hasMany(CorporateScorecardIndicators::class);
    }
}
