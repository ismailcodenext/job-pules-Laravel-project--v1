<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutHome extends Model
{
    use HasFactory;
    protected $fillable = [
        'img_url',
        'logo',
        'title',
        'user_id'
    ];
}
