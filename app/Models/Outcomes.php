<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outcomes extends Model
{
    use HasFactory;

    protected $fillable = [
        'outcome_name'
    ];

       /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function spOutcomeIndicators()
    {
        return $this->hasMany(SpOutcomeIndicators::class, 'outcome_id');
    }
}
