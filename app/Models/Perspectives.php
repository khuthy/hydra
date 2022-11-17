<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class Perspectives extends Model
{
    use HasFactory;

    protected $fillable = [
        'perspective_name'
    ];

           /**
     * @return HasMany
     * @description get all posts for the category
     */
    public function programme()
    {
        return $this->hasMany(Programmes::class, 'perspective_id');
    }
}
