<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopCompanie extends Model
{
    use HasFactory;
    protected $fillable = [
        'img_url',
        'user_id'
    ];
}

