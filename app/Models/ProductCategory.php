<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'category'
    ];
    public function offers() {
        return $this->hasMany(Offer::class, 'product_category_id');
    }
}
