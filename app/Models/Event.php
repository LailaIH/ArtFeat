<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ['starts_at','title','img','description','user_id','is_online'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
