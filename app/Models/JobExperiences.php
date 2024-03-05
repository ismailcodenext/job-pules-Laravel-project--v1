<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobExperiences extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'institutionName',
        'companyName',
        'joiningDate',
        'departureDate',
        'profile_id',
        'user_id'
    ];
}
