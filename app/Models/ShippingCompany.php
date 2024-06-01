<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;


class ShippingCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_online',
        'user_id',
        'country_id',
        'description',
    'uuid'];

        // generate a uuid for newly created records
    protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($model) {
                if (empty($model->uuid)) {
                    $model->uuid = (string) Uuid::uuid4();
                }
            });
        }   

    protected $table = 'shipping_companies'; 


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
