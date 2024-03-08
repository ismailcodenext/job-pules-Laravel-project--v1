<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function index(){
    //     try {
    //         $Laboheme_data = Home::latest()->get();
    //         return response()->json(['status' => 'success', 'Laboheme_data' => $Laboheme_data]);
    //     } catch (Exception $e) {
    //         return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    //     }
    // }
    public function  HomeCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/banner-img/{$img_name}";
            $img->move(public_path('uploads/banner-img'), $img_name);


            $img = $request->file('logoimg');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $logoimg_url = "uploads/logo-img/{$img_name}";
            $img->move(public_path('uploads/logo-img'), $img_name);

            Home::create([
                'img_url' => $img_url,
                'logo' => $logoimg_url,
                'title' => $request->input('title'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'Home content and images Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function HomeList()
    {
        try {
            $user_id = Auth::id();
            $Homedata = Home::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'Homedata' => $Homedata]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function HomeByID(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = Home::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function HomeUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $HomeContentUpdate = Home::find($request->input('id'));

            if (!$HomeContentUpdate || $HomeContentUpdate->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Laboheme Cast Page not found or unauthorized access.']);
            }

            // Update the cast information
            $HomeContentUpdate->title = $request->input('title');

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/banner-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/banner-img'), $img_name);


                if ($HomeContentUpdate->img_url && file_exists(public_path($HomeContentUpdate->img_url))) {
                    unlink(public_path($HomeContentUpdate->img_url));
                }
                $HomeContentUpdate->img_url = $img_url;
            }

            if ($request->hasFile('logoimg')) {
                $img = $request->file('logoimg');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/logo-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/logo-img'), $img_name);


                if ($HomeContentUpdate->logo && file_exists(public_path($HomeContentUpdate->logo))) {
                    unlink(public_path($HomeContentUpdate->logo));
                }
                $HomeContentUpdate->logo = $img_url;
            }


            $HomeContentUpdate->save();

            return response()->json(['status' => 'success', 'message' => 'Home Page Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function HomeDelete(Request $request)
{
    try {
        $request->validate([
            'id' => 'required|string|min:1'
        ]);

        $cast_id = $request->input('id');
        $Home_delete = Home::find($cast_id);

        if (!$Home_delete) {
            return response()->json(['status' => 'fail', 'message' => 'Home content not found.']);
        }

        // Delete associated images
        if ($Home_delete->img_url && file_exists(public_path($Home_delete->img_url))) {
            unlink(public_path($Home_delete->img_url));
        }

        if ($Home_delete->logo && file_exists(public_path($Home_delete->logo))) {
            unlink(public_path($Home_delete->logo));
        }

        // Delete Home content
        $Home_delete->delete();

        return response()->json(['status' => 'success', 'message' => 'Home content and images deleted successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


}
