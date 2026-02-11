<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rides</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen">
        <div class="flex justify-between items-center gap-10">
            <h2 class="text-2xl font-bold text-red-500 mb-6 p-6">All Rides</h2>
            <a href="/"
                class="px-6 py-3 mr-6 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition">
                Go to Home Page
            </a>
        </div>

        <div class="p-6 bg-white rounded-lg shadow-md">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        @php
                            $currentSort = $sort ?? request('sort', 'id');
                            $currentDirection = $direction ?? request('direction', 'asc');
                            $idDirection = ($currentSort === 'id' && $currentDirection === 'asc') ? 'desc' : 'asc';
                        @endphp
                        <th class="border border-gray-300 px-4 py-2 text-left">
                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'id', 'direction' => $idDirection]) }}"
                                class="inline-flex items-center gap-2 hover:text-red-500">
                                ID
                                @if($currentSort === 'id')
                                    <span
                                        class="text-xs text-gray-600">{!! $currentDirection === 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                                @endif
                            </a>
                        </th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Passenger Id</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Driver Id</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rides as $ride)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $ride->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $ride->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $ride->passenger_id }}</td>
                            <td class="border border-gray-300 px-4 py-2"> @if($ride->driver_id) {{ $ride->driver_id }} @else
                            <span class="text-gray-500 italic">Unassigned</span> @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-2 flex gap-3">
                                <!-- View Button -->
                                <a href="/admin/rides/{{ $ride->id }}" class="text-blue-600 hover:text-blue-800 underline">
                                    View
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.rides.destroy', $ride->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this ride?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 border border-gray-300 text-gray-600 font-semibold">
                                No rides created yet...
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>