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


    public function update( $role_id)
    {

        $request->validate([
            'name' => 'string|between:2,100',]);



    $user->updated_at = date('Y-m-d');
    $user->save();



}
}
