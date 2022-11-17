<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CorporateScorecards extends Model
{
    use HasFactory;



   /**
     * @return BelongsTo
     * @description get the category for the blog post.
     */
    public function spscorecard()
    {
        return $this->belongsTo(SpScorecards::class, 'sp_scorecard_id');
    }
}
