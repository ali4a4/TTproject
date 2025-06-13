<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name',
        'price',
        'expiryDate',
        'description',
        'imagePath',
        'isHidden',
        'user_id',
        'product_category_id',
        'latvian_region_id'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product_category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
    public function latvian_region() {
        return $this->belongsTo(LatvianRegion::class, 'latvian_region_id');
    }
}
