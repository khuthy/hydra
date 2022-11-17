<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;


    protected $fillable = [
        'department_name'
    ];

    /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function spOutcomeIndicators()
    {
        return $this->hasMany(SpOutcomeIndicators::class, 'department_id');
    }
    //R200+
}
