<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatvianRegion extends Model
{
    protected $fillable = [
        'region'
    ];
    public function offers() {
        return $this->hasMany(Offer::class, 'latvian_region_id');
    }
}
