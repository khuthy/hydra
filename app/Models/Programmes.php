<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/* use App\Models\CorporateScorecardIndicators;
use App\Models\Perspectives; */
class Programmes extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_name',
        'institutional_outcome',
        'perspective_id',

    ];

    public function perspective()
    {
        return $this->belongsTo(Perspectives::class, 'perspective_id');
    }
           /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function corporateScorecardIndicator()
    {
        return $this->hasMany(CorporateScorecardIndicators::class, 'programme_id');
    }
}
