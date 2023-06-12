<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;


class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
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
}
