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


        // $enroll_no = $request->enroll_no;
        // $degreeTypes = $request->degreeType;
        // $schoolNames = $request->schoolName;
        // $majors = $request->major;
        // $passYears = $request->passYear;
        // $gpas = $request->gpa;
        
        // foreach ($enroll_no as $key => $no) {
        //     $input = [
        //         'degreeType' => $degreeTypes[$key],
        //         'schoolName' => $schoolNames[$key],
        //         'major' => $majors[$key],
        //         'passYear' => $passYears[$key],
        //         'gpa' => $gpas[$key],
        //     ];
        
        //     EducationInformation::create($input);
        // }
 // Check if 'educationInfo' is present and not null in the request
if ($request->has('educationInfo') && $request->input('educationInfo') !== null) {
    // Loop through each education info entry
    foreach ($request->input('educationInfo') as $eduInfo) {
        EducationInformation::create([
            'degreeType' => $eduInfo['degreeType'],
            'schoolName' => $eduInfo['schoolName'],
            'major' => $eduInfo['major'],
            'passYear' => $eduInfo['passYear'],
            'gpa' => $eduInfo['gpa'],
            'profile_id' => $candidateProfile->id,
            'user_id' => $user_id
        ]);
    }
} else {
    // Handle the case where 'educationInfo' is null or not present in the request
    // You can log an error, return a response, or take appropriate action.
}



//   // Make sure $educationInfo is an array
//   $educationInfo = $request->input('educationInfo', []);
//   $educationInfo = is_array($educationInfo) ? $educationInfo : [];

//   // Loop through each education entry and create records
//   foreach ($educationInfo as $edu) {
//       EducationInformation::create([
//           'degreeType' => $edu['degreeType'],
//           'schoolName' => $edu['school_name'], // Check the key used in JavaScript
//           'major' => $edu['major'],
//           'passYear' => $edu['passYear'],
//           'gpa' => $edu['gpa'],
//           'profile_id' => $candidateProfile->id,
//           'user_id' => $user_id
//       ]);
//   }

  return response()->json(['status' => 'success', 'message' => 'Profile created successfully']);
} catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}




}

