<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Http\Resources\SubscribersResource;


class SubscribersController extends Controller
{
    public function show()
    {
        $subscribers =SubscribersResource::collection(Subscriber::all());
        return response()->json(['data'=>$subscribers,'error'=>''],200);
    }

    public function add()
    {
        return view('users.add-subscriber');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'     =>  'required',
        ]);
        $subscriber = Subscriber::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'created_at' =>  date('Y-m-d'),
        ]);
        return redirect()->back()->with('success','Subscriber Added Successfully');
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
        $role = Role::find($role_id);

        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'role deleted successfully'], 200);
    }


}
