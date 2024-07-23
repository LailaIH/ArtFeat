<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';

    // The attributes that are mass assignable.
    protected $fillable = [
            'user_id' ,
            'key',
            'value','created_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
