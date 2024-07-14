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
        'following',
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

    //for admin
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //for artists
    public function artworks()
    {
        return $this->hasMany(Product::class, 'artist_id');
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

    public function artist()
    {
        return $this->hasOne(Artist::class);
    }

    // one to many relationship for admin
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    // many to many relationship
    public function participatedAuctions()
    {
        return $this->belongsToMany(Auction::class)->withPivot('ending_price')->withTimestamps();
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

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function shippingCompanies(){
        return $this->hasMany(ShippingCompany::class);
    } 
    public function countries(){
        return $this->hasMany(Country::class);
    } 

    public function supports(){
        return $this->hasMany(Support::class);
    } 

    public function events(){
        return $this->hasMany(Event::class);
    } 

    public function followings(){
        return $this->hasMany(Following::class);
    }

    public function notification(){
        return $this->hasMany(Notification::class);
    }
}
