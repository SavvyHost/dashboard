<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\APITrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    use APITrait;
    public function index()
    {
        $countries = Country::all();
        $roles = Role::all();
        $all_users = User::all();

        return $this->sendSuccess("All admins and users.", compact('all_users', 'countries', 'roles'), 200);
    }
    public function index_admins()
    {
        $countries = Country::all();
        $roles = Role::all();
        $admins = User::where('role_id', 1)->get();

        return $this->sendSuccess("All Admins.", compact('admins', 'countries', 'roles'), 200);
    }
    public function index_users()
    {
        $countries = Country::all();
        $roles = Role::all();
        $users = User::where('role_id', 2)->get();

        return $this->sendSuccess("All Users.", compact('users', 'countries', 'roles'), 200);
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
            // 'role_id'      =>  'required',
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
        return $this->sendSuccess('User created successfully', compact('user'), 201);
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
        try {
            $user = User::findorFail($id);
            $user->delete();
            return $this->sendSuccess('User deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("User cann't deleted.", [], 404);
        }
    }
}
