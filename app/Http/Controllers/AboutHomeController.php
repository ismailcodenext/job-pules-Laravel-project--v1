<?php

namespace App\Http\Controllers;

use App\Models\AboutHome;
use Exception;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\Auth;

class AboutHomeController extends Controller
{
    
    public function aboutPage(){
        $AboutHomeData = AboutHome::first();
        return ResponseHelper::Out('success',$AboutHomeData,200);
    }

    
    function AboutHomeList()
    {
        try {
            $user_id = Auth::id();
            $AboutHomedata = AboutHome::where('user_id', $user_id)->get();
            return response()->json(['status' => 'success', 'AboutHomedata' => $AboutHomedata]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function  AboutHomeCreate(Request $request)
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

            AboutHome::create([
                'img_url' => $img_url,
                'logo' => $logoimg_url,
                'title' => $request->input('title'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => 'AboutHome content and images Create Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function AboutHomeByID(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = AboutHome::where('id', $request->input('id'))->where('user_id', $user_id)->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    
    function AboutHomeUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $AboutHomeContentUpdate = AboutHome::find($request->input('id'));

            if (!$AboutHomeContentUpdate || $AboutHomeContentUpdate->user_id != $user_id) {
                return response()->json(['status' => 'fail', 'message' => 'Laboheme Cast Page not found or unauthorized access.']);
            }

            // Update the cast information
            $AboutHomeContentUpdate->title = $request->input('title');

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/banner-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/banner-img'), $img_name);


                if ($AboutHomeContentUpdate->img_url && file_exists(public_path($AboutHomeContentUpdate->img_url))) {
                    unlink(public_path($AboutHomeContentUpdate->img_url));
                }
                $AboutHomeContentUpdate->img_url = $img_url;
            }

            if ($request->hasFile('logoimg')) {
                $img = $request->file('logoimg');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/logo-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/logo-img'), $img_name);


                if ($AboutHomeContentUpdate->logo && file_exists(public_path($AboutHomeContentUpdate->logo))) {
                    unlink(public_path($AboutHomeContentUpdate->logo));
                }
                $AboutHomeContentUpdate->logo = $img_url;
            }


            $AboutHomeContentUpdate->save();

            return response()->json(['status' => 'success', 'message' => 'AboutHome Page Update Successful']);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function AboutHomeDelete(Request $request)
{
    try {
        $request->validate([
            'id' => 'required|string|min:1'
        ]);

        $cast_id = $request->input('id');
        $AboutHome_delete = AboutHome::find($cast_id);

        if (!$AboutHome_delete) {
            return response()->json(['status' => 'fail', 'message' => 'AboutHome content not found.']);
        }

        // Delete associated images
        if ($AboutHome_delete->img_url && file_exists(public_path($AboutHome_delete->img_url))) {
            unlink(public_path($AboutHome_delete->img_url));
        }

        if ($AboutHome_delete->logo && file_exists(public_path($AboutHome_delete->logo))) {
            unlink(public_path($AboutHome_delete->logo));
        }

        // Delete AboutHome content
        $AboutHome_delete->delete();

        return response()->json(['status' => 'success', 'message' => 'Home content and images deleted successfully']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

}
