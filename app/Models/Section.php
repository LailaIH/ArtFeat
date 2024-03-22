<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'sections';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'description',
        'is_online',
    ];

    // Define the one-to-many relationship with products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
