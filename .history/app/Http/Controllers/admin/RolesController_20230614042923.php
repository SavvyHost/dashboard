<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\RoleResource;


class RolesController extends Controller
{



    public function show()
    {
        $countries = Country::all();
        $roles = Role::all();
        return view ('roles.create-role');
    }

    public function view_edit($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->back()->with('error', 'Role not found');
        }

        return view('roles.edit-role');
    }




    public function edit($id)
{
    $role = Role::find($id);

    if (!$role) {
        return redirect()->back()->with('error', 'Role not found');
    }

    return view('roles.edit-role', compact('role'));
}







    public function index($id)
    {
        $roles = Role::find($id);
        return view('roles.roles-list',compact('roles'));
    }

    public function role_form()
    {

        return view('roles.create-role');
    }

    public function add(Request $request)
    {
        $request->validate([
            'role_name' =>  'required',
        ]);
        $role = Role::create([
            'role_name' =>  $request->role_name,
            'created_at'    =>  date('Y-m-d'),
        ]);
        return redirect()->back()->with('success','Role Added Successfully');

    }


    public function update(Request $request, $role_id)
    {
        $request->validate([
            'role_name' => 'string|between:2,100',
        ]);

        $role = Role::find($role_id);

        if (!$role) {
            return redirect()->back()->with('error', 'Role not found');
        }

        $role->role_name = $request->input('role_name');
        $role->updated_at = date('Y-m-d');
        $role->save();

        return redirect()->back()->with('success', 'Role updated successfully');
    }












    public function index_api()
    {
        // $roles = Role::all();
        // return view('roles.roles-list',compact('roles'));
        $roles =RoleResource::collection(Role::all());
        return response()->json(['data'=>$roles,'error'=>''],200);
    }



    public function add_api(Request $request)
    {
        $request->validate([
            'role_name' =>  'required',
        ]);
        $role = Role::create([
            'role_name' =>  $request->role_name,
            'created_at'    =>  date('Y-m-d'),
        ]);
        $craeted= new RoleResource($role);
        return response()->json(['data'=>$craeted,'error'=>''],200);

    }


    public function update_api(Request $request , $role_id)
    {

        $request->validate([
            'role_name' => 'string|between:2,100',]);
            $role = Role::find($role_id);

            $role->role_name = $request->input('role_name');

            $role->updated_at = date('Y-m-d');
            $role->save();

            $updatedRole = $role;

            return response()->json(['data' => $updatedRole, 'error' => ''], 200);
    }




    public function delete_api($role_id)
    {
        $role = Role::find($role_id);

        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'role deleted successfully'], 200);
    }




    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('users.show')->with('error', 'User not found');
        }

        $role->delete();

        return redirect()->route('users.show')->with('success', 'User deleted successfully');
    }



}
