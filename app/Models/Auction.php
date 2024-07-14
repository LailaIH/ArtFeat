<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'start_time', 'end_time', 'starting_price','ending_price', 'user_id', 'is_online', 'status','product_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

      // New many-to-many relationship
      public function participants()
      {
          return $this->belongsToMany(User::class)->withPivot('ending_price')->withTimestamps();
      }

      public function product(){
        return $this->belongsTo(Product::class);
      }

}
