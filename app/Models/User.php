<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'store_name',
        'country',
        'city',
        'artwork_provided',
        'language',
        'facebook',
        'instagram',
        'twitter',
        'tiktok',
        'registered_business',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_artist'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class);
    }

    // public function artists()
    // {
    //     return $this->hasMany(Artist::class);
    // }

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function jobTitle(){
        return $this->belongsTo(JobTitle::class);
    }

    public function options(){
        return $this->hasMany(Option::class);
    }
}
