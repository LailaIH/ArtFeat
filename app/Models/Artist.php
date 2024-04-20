<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'store_name',
        'country',
        'city',
        'artwork_provided',
        'language',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
