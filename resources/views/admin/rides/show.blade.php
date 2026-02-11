<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen p-6">
        <div class="flex justify-between items-center mb-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold text-gray-900">Ride Details</h2>
            <a href="/admin/rides" class="text-blue-600 hover:text-blue-800 underline text-lg">← Back to List</a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Passenger ID</p>
                    <p class="text-xl font-semibold text-gray-900">{{ $ride->passenger_id }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Driver ID</p>
                    <p class="text-xl font-semibold text-gray-900">@if($ride->driver_id) {{ $ride->driver_id }} @else
                    <span class="text-gray-500 italic">No Driver assigned yet</span> @endif </p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Pickup Location</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $ride->pickup_lat }}, {{ $ride->pickup_lng }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Destination</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $ride->destination_lat }},
                        {{ $ride->destination_lng }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Status</p>
                    <p class="text-lg font-semibold">
                        <span
                            class="px-3 py-1 rounded-full {{ $ride->status === 'completed' ? 'bg-green-100 text-green-800' : ($ride->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($ride->status) }}
                        </span>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Created At</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $ride->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Passenger Completed</p>
                    <p class="text-lg font-semibold">
                        <span
                            class="px-3 py-1 rounded-full {{ $ride->passenger_completed ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $ride->passenger_completed ? 'Yes' : 'No' }}
                        </span>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Driver Completed</p>
                    <p class="text-lg font-semibold">
                        <span
                            class="px-3 py-1 rounded-full {{ $ride->driver_completed ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $ride->driver_completed ? 'Yes' : 'No' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>