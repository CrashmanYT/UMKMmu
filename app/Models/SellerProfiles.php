<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProfiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name', 'description', 'logo'
    ];


}
