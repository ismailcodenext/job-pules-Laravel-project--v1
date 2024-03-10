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

    function index()
    {
        $jobdetailsData = Job::first();
        return ResponseHelper::Out('success',$jobdetailsData,200);
    }

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
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function jobById(Request $request)
    {
        try {
            $request->validate(["id" => 'required|string']);
            $rows = Job::where('id', $request->id)->first();
            if ($rows) {
                return response()->json(['status' => 'success', 'rows' => $rows]);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'Job not found.']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    public function jobUpdate(Request $request)
    {
        try {
            $employerJobUpdate = Job::where('id', $request->id)->first();
            if (!$employerJobUpdate) {
                return response()->json(['status' => 'fail', 'message' => 'Employer not found or unauthorized access.']);
            }
            $employerJobUpdate->job_title = $request->input('job_title');
            $employerJobUpdate->job_description = $request->input('job_description');
            $employerJobUpdate->benefits = $request->input('benefits');
            $employerJobUpdate->location = $request->input('location');
            $employerJobUpdate->deadline = $request->input('deadline');
            $employerJobUpdate->job_type = $request->input('job_type');
            $employerJobUpdate->job_skills = $request->input('job_skills');
            $employerJobUpdate->salary = $request->input('salary');
            $employerJobUpdate->job_category = $request->input('job_category');
            $employerJobUpdate->save();
            return response()->json(['status' => 'success', 'message' => 'Employer Job Details Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }
    public function jobDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
            ]);
            $employerDelete = Job::where('id', $request->id)->first();
            if (!$employerDelete) {
                return response()->json(['status' => 'fail', 'message' => 'Employer not found or unauthorized access.']);
            }
            $employerDelete->delete();
            return response()->json(['status' => 'success', 'message' => 'Employer Job Details deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




}
