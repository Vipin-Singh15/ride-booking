<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function updateLocation(Request $request)
    {
        $request->validate([
            'driver_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        return response()->json(['message' => 'Location updated']);
    }

    public function nearbyRides(Request $request)
    {

        $data = $request->validate([
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'radius' => 'nullable|numeric|min:1'
        ]);

        $lat = $data['lat'];
        $lng = $data['lng'];
        $radius = $data['radius'] ?? 1;

        $latDelta = $radius / 111;
        $lngDelta = $radius / (111 * cos(deg2rad($lat)));

        $rides = Ride::query()
            ->where('status', 'pending')
            ->whereBetween('pickup_lat', [$lat - $latDelta, $lat + $latDelta])
            ->whereBetween('pickup_lng', [$lng - $lngDelta, $lng + $lngDelta])
            ->selectRaw(
                "id, pickup_lat, pickup_lng,
            (6371 * acos(
                cos(radians(?)) *
                cos(radians(pickup_lat)) *
                cos(radians(pickup_lng) - radians(?)) +
                sin(radians(?)) *
                sin(radians(pickup_lat))
            )) AS distance",
                [$lat, $lng, $lat]
            )
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();

        return response()->json($rides);
    }

    public function requestRide(Request $request, Ride $ride)
    {
        $ride->update([
            'driver_id' => $request->driver_id,
            'status' => 'driver_requested'
        ]);

        return response()->json(['message' => 'Ride requested']);
    }

    public function completeRide(Ride $ride)
    {
        $ride->driver_completed = true;

        if ($ride->passenger_completed) {
            $ride->status = 'completed';
        }

        $ride->save();

        return response()->json(['message' => 'Driver marked completed']);
    }

}
