<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table='pictures';
    protected $fillable = ['product_id','img'];

    // when retrieving images retrieve them as array because it's type json
    protected $casts = ['img'=>'array'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
