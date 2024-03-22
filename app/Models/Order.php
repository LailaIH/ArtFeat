<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'note',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
