<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Http\Resources\SubscribersResource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;



class SubscribersController extends Controller
{
    public function show_api()
    {
        $subscribers =SubscribersResource::collection(Subscriber::all());
        return response()->json(['data'=>$subscribers,'error'=>''],200);
    }


    public function save_api(Request $request)
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
            'name' => 'required',
            'email'     =>  'required',
        ]);
        $subscriber = Subscriber::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'created_at' =>  date('Y-m-d'),
        ]);
        $craeted= new SubscribersResource($subscriber);
        return response()->json(['data'=>$craeted,'error'=>''],200);

    }


    public function update(Request $request , $subscriber_id)
    {
        $subscriber = Subscriber::find($subscriber_id);

        $request->validate([
            'name' => 'string|between:2,100|required',
            'email' => [
                'string',
                'email',
                'max:100',
                Rule::unique('subcribers')->ignore($subscriber->id),
            ],        ]);
            $subscriber = Subscriber::find($subscriber_id);

            $subscriber->name = $request->input('name');
            $subscriber->email = $request->input('email');

            $subscriber->updated_at = date('Y-m-d');
            $subscriber->save();

            $updatedsubscriber =new SubscribersResource($subscriber);

            return response()->json(['data' => $updatedsubscriber, 'error' => ''], 200);
    }




    public function delete($subscriber_id)
    {
        $subscriber = Subscriber::find($subscriber_id);

        if (!$subscriber) {
            return response()->json(['error' => 'subscriber not found'], 404);
        }

        $subscriber->delete();

        return response()->json(['message' => 'subscriber deleted successfully'], 200);
    }


}
