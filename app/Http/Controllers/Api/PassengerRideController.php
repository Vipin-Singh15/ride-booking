<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use Illuminate\Http\Request;

class PassengerRideController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pickup_lat' => 'required|numeric|between:-90,90',
            'pickup_lng' => 'required|numeric|between:-180,180',
            'destination_lat' => 'required|numeric|between:-90,90',
            'destination_lng' => 'required|numeric|between:-180,180',
            'passenger_id' => 'required|numeric'
        ]);

        $rideAlreadyExists = Ride::where('passenger_id', $request->passenger_id)
            ->where('status', '!=', 'completed')
            ->exists();

        if ($rideAlreadyExists) {
            return response()->json([
                'message' => 'Passenger already have an active ride'
            ], 409);
        }

        $ride = Ride::create([
            'passenger_id' => $request->passenger_id,
            'pickup_lat' => $request->pickup_lat,
            'pickup_lng' => $request->pickup_lng,
            'destination_lat' => $request->destination_lat,
            'destination_lng' => $request->destination_lng,
        ]);

        return response()->json($ride, 201);
    }

    public function approveDriver(Request $request, Ride $ride)
    {
        $request->validate([
            'driver_id' => 'required|numeric'
        ]);

        $ride->update([
            'driver_id' => $request->driver_id,
            'status' => 'driver_approved'
        ]);

        return response()->json(['message' => 'Driver approved']);
    }

    public function completeRide(Ride $ride)
    {
        $ride->passenger_completed = true;

        if ($ride->driver_completed) {
            $ride->status = 'completed';
        }

        $ride->save();

        return response()->json(['message' => 'Passenger marked completed']);
    }
}
