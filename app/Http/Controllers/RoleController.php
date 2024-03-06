<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //
    public function permissionRoleList(){
        try {
            $user_id = Auth::id();
            $permissionData = Permission::all();
            return response()->json(['status' => 'success', 'permissionData' => $permissionData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function permissionCreate(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|',
                'group_name' => 'required|string|',
            ]);
            Permission::create([
                'name'=>$request->input('name'),
                'group_name'=>$request->input('group_name'),
            ]);
            return response()->json(['status' => 'success', 'message' => "Group Name Is Create Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function permissionById(Request $request)
    {
        try {
            $request->validate(["id" => 'required|string']);
            $rows = Permission::where('id', $request->input('id'))->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    public function permissionUpdate(Request $request){
        try {
            $request->validate([
                'id' => 'required|min:1',
                'name' => 'required|string',
                'group_name' => 'required|string'
            ]);

            $permission_id = $request->input('id');
            Permission::where('id',$permission_id)->update([
                'name' => $request->input('name'),
                'group_name' => $request->input('group_name')
            ]);

            return response()->json(['status' => 'success', 'message' => 'Group Name updated successfully']);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function permissionDelete(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $permission_id=$request->input('id');
            Permission::where('id',$permission_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Permission Delete Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
