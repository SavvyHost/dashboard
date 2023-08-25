<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\APITrait;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubscriberController extends Controller
{
    use APITrait;
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'required|string|unique:subscribers,email',
        ]);
        $subscriber = Subscriber::create([
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);
        return $this->sendSuccess('Subscriber is created successfully.', compact('subscriber'), 201);
    }
}