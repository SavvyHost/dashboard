<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\RoleResource;


class RolesController extends Controller
{
    public function index()
    {
        // $roles = Role::all();
        // return view('roles.roles-list',compact('roles'));
        $roles =RoleResource::collection(Role::all());
        return response()->json(['data'=>$roles,'error'=>''],200);
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
        $craeted= new RoleResource($role);
        return response()->json(['data'=>$craeted,'error'=>''],200);

    }


    public function update(Request $request , $role_id)
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




    public function delete($role_id)
    {
        $role = User::find($role_id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }


}
