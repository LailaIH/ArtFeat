<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'invoices';

    // The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'order_id',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
