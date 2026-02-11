<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rides API</title>

    <!-- Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 antialiased">
    <div class="min-h-screen p-6">
        <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-10">

            <!-- Header -->
            <h1 class="text-3xl font-bold text-red-500 mb-2">
                🚕 Rides Booking API
            </h1>
            <p class="text-gray-600 mb-6">
                A simple Laravel-based Ride Booking system with Passenger & Driver flows.
            </p>

            <!-- Available API Endpoints -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-3">
                    <!-- Available API Endpoints -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">
                            🔗 Available API Endpoints
                        </h2>

                        <div class="grid grid-cols-1 gap-6 text-gray-700">
                            <div class="bg-gray-50 p-4 rounded-md">
                                <p class="text-sm text-gray-500 font-medium">Create Ride (Passenger)</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">POST /api/passenger/rides</code></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md">
                                <p class="text-sm text-gray-500 font-medium">Approve Driver (Passenger)</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">POST /api/passenger/rides/{ride}/approve-driver</code></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md">
                                <p class="text-sm text-gray-500 font-medium">Complete Ride (Passenger)</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">POST /api/passenger/rides/{ride}/complete</code></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md">
                                <p class="text-sm text-gray-500 font-medium">Update Driver Location</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">POST /api/driver/location</code></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md">
                                <p class="text-sm text-gray-500 font-medium">Fetch Nearby Rides (Driver)</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">GET /api/driver/rides/nearby?lat={lat}&amp;lng={lng}&amp;radius=5</code></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md">
                                <p class="text-sm text-gray-500 font-medium">Driver Request Ride</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">POST /api/driver/rides/{ride}/request</code></p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-md md:col-span-2">
                                <p class="text-sm text-gray-500 font-medium">Complete Ride (Driver)</p>
                                <p class="mt-2 text-sm"><code class="bg-gray-100 px-2 py-1 rounded">POST /api/driver/rides/{ride}/complete</code></p>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-4">
                <a href="/admin/rides"
                    class="px-6 py-3 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition">
                    Go to Admin Panel
                </a>
            </div>
        </div>
    </div>

</body>

</html>