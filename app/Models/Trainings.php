<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'trainingName',
        'institutionName',
        'completionYear',
        'profile_id',
        'user_id'
    ];
}
