<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function candidateList()
    {
        try {
            $employerData = User::where('role', 'employer')->get();
            return response()->json(['status' => 'success', 'employerData' => $employerData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    public function candidateById(Request $request)
    {
        try {
            $request->validate(["id" => 'required|string']);
            $rows = User::where('id', $request->id)->first();
            if ($rows) {
                return response()->json(['status' => 'success', 'rows' => $rows]);
            } else {
                return response()->json(['status' => 'fail', 'message' => 'User not found.']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    public function candidateUpdate(Request $request)
    {
        try {
            $employerUpdate = User::where('id', $request->id)->first();
            if (!$employerUpdate) {
                return response()->json(['status' => 'fail', 'message' => 'Employer not found or unauthorized access.']);
            }
            $employerUpdate->status = $request->input('status');
            $employerUpdate->save();
            return response()->json(['status' => 'success', 'message' => 'Employer Status Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }

    }
    public function candidateDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string',
            ]);
            $employerDelete = User::where('id', $request->id)->first();
            if (!$employerDelete) {
                return response()->json(['status' => 'fail', 'message' => 'Employer not found or unauthorized access.']);
            }
            $employerDelete->delete();
            return response()->json(['status' => 'success', 'message' => 'Employer deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
