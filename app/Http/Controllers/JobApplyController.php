<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function jobAppliesCreate(Request $request){
        try {
            // Retrieve job_id, candidate_id, and user_id from the request
            $job_id = $request->input('job_id');
            $candidate_id = $request->input('candidate_id');
            $user_id = $request->input('user_id');

            // Create a new job application record
            JobApply::create([
                'job_id' => $job_id,
                'candidate_id' => $candidate_id,
                'user_id' => $user_id
            ]);

            // Return a success response
            return response()->json(['status' => 'success', 'message' => 'Job application created successfully']);
        } catch (\Exception $e) {
            // Return a fail response if an error occurs
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()], 500);
        }
    }
}
