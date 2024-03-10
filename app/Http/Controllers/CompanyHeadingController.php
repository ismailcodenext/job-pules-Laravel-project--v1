<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\CompanyHeading;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CompanyHeadingController extends Controller
{
    public function Heading(){
        $CompanieHeadingData = CompanyHeading::first();
        return ResponseHelper::Out('success',$CompanieHeadingData,200);
    }
    


    function CompanieHeadingList()
    {
        try {
            $user_id = Auth::id();
            $Companiedata = CompanyHeading::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'Companiedata' => $Companiedata]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function CompanieHeadingCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
            CompanyHeading::create([
                'heading' => $request->input('heading'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'Companie Heading Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function CompanieHeadingById(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = CompanyHeading::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function CompanieHeadingUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $CompanieUpdate = CompanyHeading::find($request->input('id'));
            if (!$CompanieUpdate || $CompanieUpdate->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Companie Heading not found or unauthorized access.']);
            }
            // Update the cast information
            $CompanieUpdate->heading = $request->input('heading');
            $CompanieUpdate->save();
            return response()->json(['status' => 'success', 'message' => 'Companie Headinge Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    

    function CompanieHeadingDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $heading_id = $request->input('id');
            $heading_delete = CompanyHeading::find($heading_id);

            if (!$heading_delete) {
                return response()->json(['status' => 'fail', 'message' => 'Heading not found.']);
            }
            CompanyHeading::where('id', $heading_id)->delete();

            return response()->json(['status' => 'success', 'message' => ' Companie Heading Delete Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
