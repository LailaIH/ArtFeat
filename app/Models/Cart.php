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
        'quantity',
    ];

    // If the 'product_id' column contains JSON data, cast it as an array


    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
