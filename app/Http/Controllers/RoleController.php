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
            return response()->json(['status' => 'success', 'message' => "Permission Is Create Successful"]);
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

    public function roleList(){
        try {
            $roleData = Role::all();
            return response()->json(['status' => 'success', 'roleData' => $roleData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function roleCreate(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|'
            ]);
            Role::create([
                'name'=>$request->input('name')
            ]);
            return response()->json(['status' => 'success', 'message' => "Role Is Create Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function roleById(Request $request){
        try {
            $request->validate(["id" => 'required|string']);
            $rows = Role::where('id', $request->input('id'))->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function roleUpdate(Request $request){
        try {
            $request->validate([
                'id' => 'required|min:1',
                'name' => 'required|string'
            ]);

            $role_id = $request->input('id');
            Role::where('id',$role_id)->update([
                'name' => $request->input('name')
            ]);

            return response()->json(['status' => 'success', 'message' => 'Role Name updated successfully']);

        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function roleDelete(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $role_id=$request->input('id');
            Role::where('id',$role_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Role Delete Successful"]);
        }catch (Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }








}
