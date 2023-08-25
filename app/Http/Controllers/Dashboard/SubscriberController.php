<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\APITrait;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscribersResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubscriberController extends Controller
{
    use APITrait;

    public function index()
    {
        $subscribers = SubscribersResource::collection(Subscriber::all());
        return $this->sendSuccess("All Subscribers.", compact('subscribers'));
    }

    public function destroy(string $id)
    {
        try {
            $user = Subscriber::findorFail($id);
            $user->delete();
            return $this->sendSuccess('Subscriber deleted successfully.', []);
        } catch (ModelNotFoundException $e) {
            return $this->sendError("Subscriber Not Found", [], 404);
        }
    }
}