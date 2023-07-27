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
}
