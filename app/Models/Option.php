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
        'is_online',
        'paypal_key',
        'paypal_secret',
        'stripe_key',
        'stripe_secret',
        'crypto_key',
        'crypto_secret',
        'site_name',
        'tags',
        'slide_img_1',
        'slide_img_2',
        'slide_img_3',
        'slide_text_1',
        'slide_text_2',
        'slide_text_3',
        'primary_color',
        'secondary_color',
        'why_artfeat_text',
    ];
}
