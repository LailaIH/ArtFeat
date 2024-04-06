<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'stock_quantity',
        'img',
        'is_online',
        'artist_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function artist()
    // {
    //     return $this->belongsTo(Artist::class);
    // }

    // Define the relationship with the section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
