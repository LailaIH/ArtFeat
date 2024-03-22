<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'audio_url', 'user_id', 'is_online', 'status', 'is_free'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
