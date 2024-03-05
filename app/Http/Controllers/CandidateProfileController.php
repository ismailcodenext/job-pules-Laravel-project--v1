<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;


class CandidateProfileController extends Controller
{
    public function ProfileCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
    
            // Validation rules
            $validationRules = [
                'full_name' => 'required|string|max:255',
                'father_name' => 'required|string|max:255',
                'mother_name' => 'required|string|max:255',
                'dof' => 'required|date',
                'blood_group' => 'required|string|max:10',
                'nid_number' => 'required|string|max:20',
                // Add validation rules for other fields
            ];
    
            // Validate the request data
            $request->validate($validationRules);
    
            // Create a new candidate profile
            CandidateProfile::create([
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
    
            return response()->json(['status' => 'success', 'message' => 'Profile Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    
}
