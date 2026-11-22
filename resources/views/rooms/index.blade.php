<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl font-semibold text-[#D9A85B]">
            Room Management
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-10 px-4">
        <div class="max-w-7xl mx-auto">

            <!-- Page Heading -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-5 mb-8">
                <div>
                    <p class="text-xs tracking-[0.35em] text-[#D9A85B] uppercase">
                        MHILLIANA GRAND HOTEL
                    </p>

                    <h1 class="font-serif text-4xl text-[#F5F2EC] mt-2">
                        Room Management
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Manage hotel rooms, room types, pricing, and availability.
                    </p>
                </div>

                <a href="{{ route('rooms.create') }}"
                    class="inline-flex items-center justify-center gap-2 bg-[#D9A85B] hover:bg-[#B58A4A] text-[#171717] font-semibold px-5 py-3 rounded-lg transition">
                    <span class="text-xl">+</span>
                    Add New Room
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg border border-green-700 bg-green-900/30 text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="mb-6 p-4 rounded-lg border border-red-700 bg-red-900/30 text-red-300">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Room Management Card -->
            <div class="bg-[#252525] border border-[#494034] rounded-2xl shadow-xl overflow-hidden">

                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="font-serif text-2xl text-[#F5F2EC]">
                                Hotel Rooms
                            </h3>

                            <p class="text-sm text-gray-400 mt-1">
                                View and manage all registered hotel rooms.
                            </p>
                        </div>

                        <div class="text-right">
                            <p class="text-2xl font-bold text-[#D9A85B] tabular-nums">
                                {{ $rooms->count() }}
                            </p>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">
                                Total Rooms
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t border-[#494034]"></div>

                @if ($rooms->count() > 0)

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">

                            <thead class="bg-[#1B1B1B] text-[#D9A85B] uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="px-6 py-4 whitespace-nowrap">Room Number</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Room Type</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Price per Night</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Status</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-700">

                                @foreach ($rooms as $room)
                                    <tr class="hover:bg-[#303030] transition">

                                        <td class="px-6 py-5 text-[#F5F2EC] font-semibold whitespace-nowrap">
                                            {{ $room->room_number }}
                                        </td>

                                        <td class="px-6 py-5 text-gray-300 whitespace-nowrap">
                                            {{ $room->room_type }}
                                        </td>

                                        <td class="px-6 py-5 text-[#D9A85B] font-semibold whitespace-nowrap">
                                            ₱{{ number_format($room->price_per_night, 2) }}
                                        </td>

                                        <td class="px-6 py-5 whitespace-nowrap">
                                            @if (strtolower($room->status) === 'available')
                                                <span class="px-3 py-1 rounded-full bg-green-900/40 text-green-300 text-xs font-semibold">
                                                    Available
                                                </span>
                                            @elseif (strtolower($room->status) === 'occupied')
                                                <span class="px-3 py-1 rounded-full bg-red-900/40 text-red-300 text-xs font-semibold">
                                                    Occupied
                                                </span>
                                            @elseif (strtolower($room->status) === 'maintenance')
                                                <span class="px-3 py-1 rounded-full bg-yellow-900/40 text-yellow-300 text-xs font-semibold">
                                                    Maintenance
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full bg-gray-700 text-gray-300 text-xs font-semibold">
                                                    {{ ucfirst($room->status) }}
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <div class="flex items-center gap-3">

                                                <a href="{{ route('rooms.show', $room) }}"
                                                    class="text-blue-400 hover:text-blue-300 font-medium transition">
                                                    View
                                                </a>

                                                <span class="text-gray-600">|</span>

                                                <a href="{{ route('rooms.edit', $room) }}"
                                                    class="text-[#D9A85B] hover:text-[#F5F2EC] font-medium transition">
                                                    Edit
                                                </a>

                                                <span class="text-gray-600">|</span>

                                                <form action="{{ route('rooms.destroy', $room) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this room?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="text-red-400 hover:text-red-300 font-medium transition">
                                                        Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                @else

                    <!-- Empty State -->
                    <div class="text-center py-16 px-6">
                        <div class="text-5xl text-[#D9A85B] mb-4">
                            🏨
                        </div>

                        <h3 class="font-serif text-2xl text-[#F5F2EC]">
                            No Rooms Available
                        </h3>

                        <p class="text-gray-400 mt-3 max-w-md mx-auto">
                            You haven't added any hotel rooms yet. Start building your room inventory by adding your first room.
                        </p>

                        <a href="{{ route('rooms.create') }}"
                            class="inline-block mt-6 bg-[#D9A85B] hover:bg-[#B58A4A] text-[#171717] font-semibold px-6 py-3 rounded-lg transition">
                            + Add Your First Room
                        </a>
                    </div>

                @endif

                <div class="border-t border-[#494034]"></div>

                <div class="px-6 py-4">
                    <a href="{{ route('dashboard') }}"
                        class="text-sm text-[#D9A85B] hover:text-[#F5F2EC] transition">
                        ← Back to Dashboard
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
