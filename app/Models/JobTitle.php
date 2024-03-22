<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'job_titles';

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'description',
        'is_online'
    ];
}
