<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json($subscriptions);
    }

    public function show(Subscription $subscription)
    {
        return response()->json($subscription);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $subscription = Subscription::create($request->all());
        return response()->json($subscription, 201);
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'plan' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $subscription->update($request->all());
        return response()->json($subscription);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return response()->json(null, 204);
    }
}
