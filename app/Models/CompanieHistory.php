<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanieHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'details',
        'user_id'
    ];
}

