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
        // The `seller_id` column on the products table references the users
        // table. A seller profile record is linked to a user via `user_id`,
        // so we need to specify that owner key explicitly when defining the
        // relationship.
        return $this->belongsTo(SellerProfiles::class, 'seller_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
