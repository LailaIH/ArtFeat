<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkProvided extends Model
{
    use HasFactory;

    protected $table = 'artwork_provided';



    protected $fillable = [
        'name',
        'description',];

     public function artist(){
        return $this->hasMany(Artist::class);
     }   
}
