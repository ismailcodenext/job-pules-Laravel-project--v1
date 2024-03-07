<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'degreeType',
        'schoolName',
        'major',
        'passYear',
        'gpa',
        'profile_id',
        'user_id'
    ];

    public function candidateProfile()
{
    return $this->belongsTo(CandidateProfile::class);
}

}
