<?php

namespace App\Http\Controllers;

use App\Models\JobApply;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function jobAppliesCreate(Request $request){
        try {
            // Assuming 'updateID' and 'user_id' are sent in the request body
            $updateID = $request->input('updateID');
            $user_id = $request->input('user_id');

            // Validate inputs if necessary

            // Create a new JobApply instance
            $jobApply = new JobApply();
            $jobApply->job_id = $updateID;
            $jobApply->user_id = $user_id;

            // Save the job application
            $jobApply->save();

            // Return a success response
            return response()->json(['status' => 'success', 'message' => 'Job application saved successfully']);
        } catch (\Exception $e) {
            // Return an error response in case of any exception
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
