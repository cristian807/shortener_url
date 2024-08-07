<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortener extends Model
{
    use HasFactory;

    protected $fillable=[
        'code_url',
        'origin_url',
        'new_url'
    ];

}
