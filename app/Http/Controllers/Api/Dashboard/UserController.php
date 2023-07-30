<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $countries = Country::collection(all());
        $roles = Role::all();
        return $this->sendSuccess("All Users.", compact('countries', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email'     =>  'required',
            'phone'     =>  'required',
            'password'  =>  'required',
            'bio'       =>  'nullable',
            'country'   =>  'required',
            // 'gender'    =>  'required',
            // 'role'      =>  'required',
            'status' => 'in:active,suspend',
        ]);
        if ($request->file('avatar')) {
            $avatar = uploadImage($request->file('avatar'), 'user-photos');
        }
        $user = User::create([
            'name'      => $request->name,
            'username'  =>  $request->username,
            'avatar'    => $avatar ?? null,
            'status'    => $request->status,
            'email'     =>  $request->email,
            'type'      =>  $request->type,
            'phone'     =>  $request->phone,
            'password'  =>  Hash::make($request->password),
            'bio'       =>  $request->bio,
            'country'   =>  $request->country,
            'gender'    =>  $request->gender,
            'role_id'   =>  $request->role_id,
            'created_at' =>  date('Y-m-d'),
        ]);
        $response = [
            'Message' => 'User created successfully',
            'User' => $user
        ];
        return response($response, 201);
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $response = [
            'Message' => 'Specific User',
            'User' => $user
        ];
        return response($response, 201);
    }

    public function update(Request $request, string $id)
    {
        $user = User::findorFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email'     =>  'required',
            'phone'     =>  'required',
            'password'  =>  'required',
            'bio'       =>  'nullable',
            'country'   =>  'required',
            'status' => 'in:active,suspend',
        ]);
        if ($request->file('avatar')) {
            $avatar = uploadImage($request->file('avatar'), 'user-photos');
            $user->update([
                'image' => $avatar
            ]);
        }
        $user->update([
            'name'      => $request->name,
            'username'  =>  $request->username,
            'avatar'    => $avatar ?? null,
            'status'    => $request->status,
            'email'     =>  $request->email,
            'type'      =>  $request->type,
            'phone'     =>  $request->phone,
            'password'  =>  Hash::make($request->password),
            'bio'       =>  $request->bio,
            'country'   =>  $request->country,
            'gender'    =>  $request->gender,
            'role_id'   =>  $request->role_id,
            'created_at' =>  date('Y-m-d'),
        ]);
        $response = [
            'Message' => 'User updated successfully',
            'User' => $user
        ];
        return response($response, 201);
    }

    public function destroy(string $id)
    {
        $user = User::findorFail($id);
        $user->delete();
        $response = [
            'Message' => 'User deleted successfully',
        ];
        return response($response, 201);
    }
}
