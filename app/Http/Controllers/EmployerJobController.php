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


    public function jobCreate(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'jobTitle' => 'required|string|max:255',
                'jobDescription' => 'required|string',
                'benefits' => 'nullable|string',
                'location' => 'required|string|max:255',
                'deadline' => 'required|date',
                'jobType' => 'required|string', // Adjust as needed
                'jobSkills' => 'required|array', // Validate that jobSkills is an array
                'salary' => 'nullable|string', // You might want to adjust this based on your salary format
                'status' => 'required|string', // You might want to adjust this based on your salary format
                'jobCategory' => 'required|string', // Validate that jobCategory is a string
            ]);

            // Convert jobSkills to a JSON string
            $jobSkills = json_encode($request->input('jobSkills'));

            // Create a new job post
            Job::create([
                'job_title' => $request->input('jobTitle'),
                'job_description' => $request->input('jobDescription'),
                'benefits' => $request->input('benefits'),
                'location' => $request->input('location'),
                'deadline' => $request->input('deadline'),
                'job_type' => $request->input('jobType'),
                'job_skills' => $jobSkills,
                'salary' => $request->input('salary'),
                'status' => $request->input('status'),
                'job_category' => $request->input('jobCategory'), // Add job_category field
                'user_id' => auth()->id(), // Assuming the user is authenticated
            ]);

            return response()->json(['status' => 'success', 'message' => 'Job post created successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }





}
