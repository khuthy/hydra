<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MtsfPriorities extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority_name',
    ];
       /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function spOutcomeIndicator()
    {
        return $this->hasMany(SpOutcomeIndicators::class, 'mtsf_priority_id');
    }
}
