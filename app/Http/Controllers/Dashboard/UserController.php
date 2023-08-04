<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function uploadImage;

class UserController extends Controller
{
    use APITrait;
    
    public function index()
    {
        $all_users = UserResource::collection(User::all());
        return $this->sendSuccess("All admins and users.", compact('all_users'));
    }
    
    public function index_admins()
    {
        $admins = UserResource::collection(User::where('role_id', 1)->get());
        return $this->sendSuccess("All Admins.", compact('admins'));
    }
    
    public function index_users()
    {
        $users = UserResource::collection(User::where('role_id', 2)->get());
        return $this->sendSuccess("All Users.", compact('users'));
    }
    
    public function create()
    {
        $countries = Country::all();
        $roles = Role::all();
        return $this->sendSuccess('', compact('roles', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'bio' => 'nullable',
            'country_id' => 'required|exists:apps_countries,id',
            // 'gender'    =>  'required',
            // 'role_id'      =>  'required',
            'status' => 'in:active,suspend',]);
        
        if ( $request->file('avatar') ) {
            $avatar = uploadImage($request->file('avatar'), 'user-photos');
        }
        
        try {
            $user = User::create(['name' => $request->name,
                'username' => $request->username,
                'avatar' => $avatar ?? null,
                'status' => $request->status,
                'email' => $request->email,
                'type' => $request->type,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'bio' => $request->bio ?? null,
                'country_id' => $request->country_id,
                'gender' => $request->gender,
                'role_id' => $request->role_id
            ]);
            
            $user = new UserResource($user);
            
            return $this->sendSuccess('User created successfully', compact('user'), 201);
        } catch ( Exception $e ) {
            return $this->sendError('User Not Created', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            $user = new UserResource( User::findorFail($id) );
            return $this->sendSuccess('User Found successfully', compact('user'));
        } catch (ModelNotFoundException $e) {
            return $this->sendError("User Not Found.",  404);
        }
    }
    
    public function edit(string $id)
    {
        try {
            $user = new UserResource( User::findorFail($id) );
        } catch (ModelNotFoundException $e) {
            return $this->sendError("User Not Found.", 404);
        }
        $countries = Country::all();
        $roles = Role::all();
        return $this->sendSuccess('', compact('roles', 'countries', 'user'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = User::findorFail($id);
    
        } catch ( ModelNotFoundException $e ) {
            return $this->sendError("User can't be updated.", [], 404);
        }
        
        $request->validate(['name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'bio' => 'nullable',
            'country_id' => 'required|exists:apps_countries,id',
            'status' => 'in:active,suspend',]);
        
        if ( $request->file('avatar') ) {
            $avatar = uploadImage($request->file('avatar'), 'user-photos');
            $user->update(['avatar' => $avatar]);
        }
        
        try {
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'status' => $request->status,
                'email' => $request->email,
                'type' => $request->type,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'bio' => $request->bio,
                'country_id' => $request->country_id,
                'gender' => $request->gender,
                'role_id' => $request->role_id,
            ]);
            $user->save();
    
            $user = new UserResource($user);
    
            return $this->sendSuccess('User updated successfully.', compact('user'));
        } catch ( Exception $e ) {
            return $this->sendError('User Not Updated', $e->getMessage());
        }
    }
    
    public function destroy( string $id )
    {
        try {
            $user = User::findorFail($id);
            $user->delete();
            return $this->sendSuccess('User deleted successfully.', []);
        } catch ( ModelNotFoundException $e ) {
            return $this->sendError("User Not Found", [], 404);
        }
    }
}
