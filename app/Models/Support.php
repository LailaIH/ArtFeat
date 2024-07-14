<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $table = 'supports';
    protected $fillable = ['title','img','description','user_id','is_online'];


    public function user(){
        return $this->belongsTo(User::class);
    }


}
