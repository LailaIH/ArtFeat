<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'product_id',
        'max_products',
    ];

    // If the 'product_id' column contains JSON data, cast it as an array
    protected $casts = [
        'product_id' => 'array',
    ];

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
