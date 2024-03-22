<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'start_time', 'end_time', 'starting_price', 'user_id', 'is_online', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
