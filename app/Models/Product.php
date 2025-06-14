<?php

namespace App\Models;

use App\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name', 'description', 'price', 'category', 'image', 'seller_id'
    ];

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    public function users() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function seller()
    {  
        return $this->belongsTo(SellerProfiles::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
