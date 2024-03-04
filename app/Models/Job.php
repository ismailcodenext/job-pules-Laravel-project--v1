<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'benefits',
        'location',
        'deadline',
        'status',
        'job_type',
        'job_skills',
        'salary',
        'job_category',
        'user_id',
    ];
}
