<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\CompanieHistory;
use Exception;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CompanieHistoryController extends Controller
{

    
    public function CompanieHistory(){
        try {
            $Companie_data = CompanieHistory::latest()->get();
            return response()->json(['status' => 'success', 'Companie_data' => $Companie_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function CompanieHistoryList()
    {
        try {
            $user_id = Auth::id();
            $CompanieHistory = CompanieHistory::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'CompanieHistory' => $CompanieHistory]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function CompanieHistoryCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
    
            CompanieHistory::create([
                'heading' => $request->input('heading'),
                'details' => $request->input('details'),
                'user_id' => $user_id
            ]);
    
            return response()->json(['status' => 'success', 'message' => 'Companie content Page Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    
    function CompanieHistoryById(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = CompanieHistory::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function CompanieHistoryUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $CompanieHistory_Update = CompanieHistory::find($request->input('id'));

            if (!$CompanieHistory_Update || $CompanieHistory_Update->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Companie content not found or unauthorized access.']);
            }
            $CompanieHistory_Update->heading = $request->input('heading');
            $CompanieHistory_Update->details = $request->input('details');
            $CompanieHistory_Update->save();

            return response()->json(['status' => 'success', 'message' => 'Companie content Page Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function CompanieHistoryDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $CompanieHistoryDelete_id = $request->input('id');
            $CompanieHistoryDelete = CompanieHistory::find($CompanieHistoryDelete_id);

            if (!$CompanieHistoryDelete) {
                return response()->json(['status' => 'fail', 'message' => 'LaboHeme not found.']);
            }
            CompanieHistory::where('id', $CompanieHistoryDelete_id)->delete();

            return response()->json(['status' => 'success', 'message' => 'Companie content Page Delete Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
