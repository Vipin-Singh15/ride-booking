<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use Illuminate\Http\Request;

class AdminRideController extends Controller
{
    public function index(Request $request)
    {
        $allowed = ['id', 'status', 'created_at'];
        $sort = $request->get('sort', 'id');
        if (! in_array($sort, $allowed)) {
            $sort = 'id';
        }

        $direction = $request->get('direction', 'asc') === 'desc' ? 'desc' : 'asc';

        $rides = Ride::orderBy($sort, $direction)->get();

        return view('admin.rides.index', compact('rides', 'sort', 'direction'));
    }

    public function show(Ride $ride)
    {
        return view('admin.rides.show', compact('ride'));
    }
}
