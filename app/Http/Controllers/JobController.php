<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Exception;
use Illuminate\Http\Request;


class JobController extends Controller
{

    public function index()
    {
        try {
            $jobListData = Job::where('status', 'approved')->latest()->get();
            return response()->json(['status' => 'success', 'jobListData' => $jobListData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    // public function index()
    // {
    //     try {
    //         // Check if the user is authenticated
    //         if (!auth()->check()) {
    //             // If not authenticated, redirect to the login page
    //             return redirect()->route('/employer-login');
    //         }
    
    //         // Get the authenticated user
    //         $user = auth()->user();
    
    //         // Fetch job list data for authenticated users
    //         $jobListData = Job::where('status', 'approved')->latest()->get();
    
    //         return response()->json(['status' => 'success', 'user' => $user, 'jobListData' => $jobListData]);
    //     } catch (Exception $e) {
    //         return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    //     }
    // }
    

    public function jobCompanyList(){
        try {
            $jobData = Job::all();
            return response()->json(['status' => 'success', 'jobData' => $jobData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function jobCompanyById(Request $request)
    {
        try {
            $request->validate(["id" => 'required|string']);
    
            // Check if the user is authenticated
            if (!$request->user()) {
                return response()->json(['status' => 'unauthenticated', 'message' => 'User is not authenticated.']);
            }
    
            $rows = Job::where('id', $request->id)->first();
            if ($rows) {
                return response()->json(['status' => 'success', 'rows' => $rows]);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'Job not found.']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    

    public function jobCompanyUpdate(Request $request)
    {
        try {
            $ComapnyUpdate = Job::where('id', $request->id)->first();
            if (!$ComapnyUpdate) {
                return response()->json(['status' => 'fail', 'message' => 'Comapny not found or unauthorized access.']);
            }
            $ComapnyUpdate->status = $request->input('status');
            $ComapnyUpdate->save();
            return response()->json(['status' => 'success', 'message' => 'Comapny Status Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }

}
