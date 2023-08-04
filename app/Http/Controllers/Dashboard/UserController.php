<?php

// namespace App\Http\Controllers\Dashboard;
namespace App\Http\Controllers;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function response;
use function uploadImage;

class UserController extends Controller
{
    use APITrait;
    public function index()
    {
        $all_users = UserResource::collection(User::with('countries')->get());
        return $this->sendSuccess("All admins and users.", compact('all_users'), 200);
    }
    public function index_admins()
    {
        $admins = User::where('role_id', 1)->get();

        return $this->sendSuccess("All Admins.", compact('admins'), 200);
    }
    public function index_users()
    {
        $users = User::where('role_id', 2)->get();

        return $this->sendSuccess("All Users.", compact('users'), 200);
    }
    public function create()
    {
        $countries = Country::all();
        $roles = Role::all();
        return $this->sendSuccess('', compact('roles', 'countries'));
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
            'avatar'    => asset($avatar) ?? null,
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
        try {
            $user = User::findOrFail($id);
            return $this->sendSuccess('User Found successfully', compact('user'), 201);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("User Not Found.",  404);
        }
    }
    public function edit()
    {
        $countries = Country::all();
        $roles = Role::all();
        return $this->sendSuccess('', compact('roles', 'countries'));
    }


    public function update(Request $request, string $id)
    {
        try {
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
                    'avatar' => asset($avatar)
                ]);
            }
            $user->update([
                'name'      => $request->name,
                'username'  =>  $request->username,
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
            $user->save();
            return $this->sendSuccess('User updated successfully.', compact('user'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("User can't be updated.", [], 404);
        }
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
