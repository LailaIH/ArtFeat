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
        'description',
        'years_of_experience',
        'expertise',
        'website',
        'behance',
        'artwork_provided_id',
    ];

    protected $casts = [
        'expertise' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function artwork()
    {
        return $this->belongsTo(ArtworkProvided::class);
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
