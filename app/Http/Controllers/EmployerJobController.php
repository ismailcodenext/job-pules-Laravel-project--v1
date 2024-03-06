<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Exception;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{

    function jobList()
    {
        try {
            $user_id = Auth::id();
            $job_data = Job::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'job_data' => $job_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function jobCreate(Request $request)
    {
        try {

            $user_id = Auth::id();

            // Create a new job post
            Job::create([
                'job_title' => $request->input('jobTitle'),
                'job_description' => $request->input('jobDescription'),
                'benefits' => $request->input('benefits'),
                'location' => $request->input('location'),
                'deadline' => $request->input('deadline'),
                'job_type' => $request->input('jobType'),
                'job_skills' => html_entity_decode($request->input('job_skills')), // Decode HTML entities
                'salary' => $request->input('salary'),
                'status' => $request->input('status'),
                'job_category' => $request->input('jobCategory'),
                'user_id' => $user_id
            ]);

            return response()->json(['status' => 'success', 'message' => 'Job post created successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }






}
