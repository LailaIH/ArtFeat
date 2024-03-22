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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
