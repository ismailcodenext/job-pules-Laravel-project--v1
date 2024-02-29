<?php

namespace App\Http\Controllers;
use App\Models\HomePage;
use Exception;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $HomePageData = HomePage::first();
        return ResponseHelper::Out('success',$HomePageData,200);
    }

    public function HomePageCreate(Request $request)
    {
        
        try {
            $user_id = Auth::id();
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/HomeGallary-img/{$img_name}";
            $img->move(public_path('uploads/HomePage-img'), $img_name);
    
            HomePage::create([
                'img_url' => $img_url,
                'description' => $request->input('description'),
                'user_id' => $user_id
            ]);
    
            return response()->json(['status' => 'success', 'message' => 'Home Page Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
    
    
    function HomePageList()
    {
        try {
            $user_id = Auth::id();
            $Home_data = HomePage::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'Home_data' => $Home_data]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function HomePageByID(Request $request)
    {
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = HomePage::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function HomePageUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $HomePageUpdate = HomePage::find($request->input('id'));

            if (!$HomePageUpdate || $HomePageUpdate->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Home Page not found or unauthorized access.']);
            }



            $HomePageUpdate->peragraph = $request->input('peragraph');
            $HomePageUpdate->description = $request->input('description');
            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/HomeGallary-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/HomeGallary-img'), $img_name);


                if ($HomePageUpdate->img_url && file_exists(public_path($HomePageUpdate->img_url))) {
                    unlink(public_path($HomePageUpdate->img_url));
                }
                $HomePageUpdate->img_url = $img_url;
            }


            $HomePageUpdate->save();

            return response()->json(['status' => 'success', 'message' => 'Home Page Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function HomePageDelete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $HomePageDelete_id = $request->input('id');
            $HomePageDelete = HomePage::find($HomePageDelete_id);

            if (!$HomePageDelete) {
                return response()->json(['status' => 'fail', 'message' => 'Home Page Delete not found.']);
            }
            if ($HomePageDelete->img_url && file_exists(public_path($HomePageDelete->img_url))) {
                unlink(public_path($HomePageDelete->img_url));
            }

            HomePage::where('id', $HomePageDelete_id)->delete();

            return response()->json(['status' => 'success', 'message' => 'Home Gallary Delete Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
