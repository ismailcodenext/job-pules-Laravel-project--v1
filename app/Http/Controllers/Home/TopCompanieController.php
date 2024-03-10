<?php

namespace App\Http\Controllers\Home;

use Exception;
use App\Models\TopCompanie;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TopCompanieController extends Controller
{

    public function index(){
        try {
            $Companie_data = TopCompanie::latest()->get();
            return response()->json(['status' => 'success', 'Companie_data' => $Companie_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function CompanieList()
    {
        try {
            $user_id = Auth::id();
            $Companiedata = TopCompanie::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'Companiedata' => $Companiedata]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function CompanieCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/companie-img/{$img_name}";
            $img->move(public_path('uploads/companie-img'), $img_name);

            TopCompanie::create([
                'img_url' => $img_url,
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => ' Companie images Create Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function CompanieById(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = TopCompanie::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function CompanieUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $CompanieUpdate = TopCompanie::find($request->input('id'));
            if (!$CompanieUpdate || $CompanieUpdate->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Companie image not found or unauthorized access.']);
            }
            // Update the cast information
            $CompanieUpdate->img_url = $request->input('img_url');
            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/uploads/companie-img/{$img_name}";
                // Upload File
                $img->move(public_path('uploads/uploads/companie-img'), $img_name);
                if ($CompanieUpdate->img_url && file_exists(public_path($CompanieUpdate->img_url))) {
                    unlink(public_path($CompanieUpdate->img_url));
                }
                $CompanieUpdate->img_url = $img_url;
            }
            $CompanieUpdate->save();
            return response()->json(['status' => 'success', 'message' => ' Companie images Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    

    function CompanieDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $cast_id = $request->input('id');
            $caste_delete = TopCompanie::find($cast_id);

            if (!$caste_delete) {
                return response()->json(['status' => 'fail', 'message' => 'caste not found.']);
            }

            if ($caste_delete->image && file_exists(public_path($caste_delete->image))) {
                unlink(public_path($caste_delete->image));
            }

            TopCompanie::where('id', $cast_id)->delete();

            return response()->json(['status' => 'success', 'message' => ' Companie images Delete Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



}
