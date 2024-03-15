<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateProfile;
use App\Models\EducationInformation;
use App\Models\JobExperiences;
use App\Models\Trainings;
use Illuminate\Support\Facades\Auth;



class CandidateProfileController extends Controller
{
    function ProfileList()
{
    try {
        $user_id = Auth::id();
        $profile_data = CandidateProfile::where('user_id', $user_id)->get();
        return response()->json(['status' => 'success', 'profile_data' => $profile_data]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


    public function ProfileCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Create a new candidate profile
            $candidateProfile = CandidateProfile::create([
                'full_name' => $request->input('full_name'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'dof' => $request->input('dof'),
                'blood_group' => $request->input('blood_group'),
                'nid_number' => $request->input('nid_number'),
                'passport_no' => $request->input('passport_no'),
                'cell_no' => $request->input('cell_no'),
                'emergency_contact_no' => $request->input('emergency_contact_no'),
                'email' => $request->input('email'),
                'whatsapp_number' => $request->input('whatsapp_number'),
                'linkedin_link' => $request->input('linkedin_link'),
                'facebook_link' => $request->input('facebook_link'),
                'github_link' => $request->input('github_link'),
                'portfolio_link' => $request->input('portfolio_link'),
                'portfolio_website' => $request->input('portfolio_website'),
                'user_id' => $user_id
            ]);

            // Check if the profile creation was successful
            if ($candidateProfile) {
                return response()->json(['status' => 'success', 'message' => 'Profile created successfully']);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'Failed to create profile'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }








}

