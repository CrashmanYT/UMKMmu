<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = [
        'quantity',
        'price',
        'order_id',
        'product_id'
    ];

    public function orders() {
        return $this->belongsTo(Order::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
} 
