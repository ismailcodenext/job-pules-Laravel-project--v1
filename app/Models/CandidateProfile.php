<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'father_name',
        'mother_name',
        'dof',
        'blood_group',
        'nid_number',
        'passport_no',
        'cell_no',
        'emergency_contact_no',
        'email',
        'whatsapp_number',
        'linkedin_link',
        'facebook_link',
        'github_link',
        'portfolio_link',
        'portfolio_website',
        'user_id'
        
    ];

    public function educationInformation()
{
    return $this->hasMany(EducationInformation::class);
}
}
