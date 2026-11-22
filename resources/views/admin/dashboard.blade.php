<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-amber-600">
                MHILLIANA GRAND HOTEL
            </p>
            <h2 class="font-serif text-2xl text-gray-900 dark:text-white">
                Admin Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-10 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Welcome Section --}}
            <div class="mb-10">
                <p class="text-sm text-gray-400">
                    Administration / Dashboard
                </p>

                <h1 class="mt-2 text-3xl sm:text-4xl font-serif text-[#F5F2EC]">
                    Welcome Back, {{ auth()->user()->name }}
                </h1>

                <p class="mt-2 text-gray-400">
                    Here's an overview of your hotel's operations and reservations.
                </p>
            </div>

            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-10">

                {{-- Total Rooms --}}
                <div class="bg-[#252525] border border-gray-700 rounded-xl p-6 shadow-lg">
                    <p class="text-sm text-gray-400">
                        Total Rooms
                    </p>

                    <h2 class="mt-3 text-3xl font-semibold text-[#F5F2EC]">
                        {{ $totalRooms }}
                    </h2>

                    <p class="mt-2 text-xs text-gray-500">
                        Registered hotel rooms
                    </p>

                    <a href="{{ route('rooms.index') }}"
                       class="inline-block mt-5 text-sm text-amber-500 hover:text-amber-400 font-semibold">
                        Manage Rooms →
                    </a>
                </div>

                {{-- Available Rooms --}}
                <div class="bg-[#252525] border border-gray-700 rounded-xl p-6 shadow-lg">
                    <p class="text-sm text-gray-400">
                        Available Rooms
                    </p>

                    <h2 class="mt-3 text-3xl font-semibold text-green-400">
                        {{ $availableRooms }}
                    </h2>

                    <p class="mt-2 text-xs text-gray-500">
                        Ready for guest bookings
                    </p>

                    <a href="{{ route('rooms.index') }}"
                       class="inline-block mt-5 text-sm text-amber-500 hover:text-amber-400 font-semibold">
                        View Rooms →
                    </a>
                </div>

                {{-- Occupied Rooms --}}
                <div class="bg-[#252525] border border-gray-700 rounded-xl p-6 shadow-lg">
                    <p class="text-sm text-gray-400">
                        Occupied Rooms
                    </p>

                    <h2 class="mt-3 text-3xl font-semibold text-red-400">
                        {{ $occupiedRooms }}
                    </h2>

                    <p class="mt-2 text-xs text-gray-500">
                        Currently marked occupied
                    </p>

                    <a href="{{ route('rooms.index') }}"
                       class="inline-block mt-5 text-sm text-amber-500 hover:text-amber-400 font-semibold">
                        View Rooms →
                    </a>
                </div>

                {{-- Pending Reservations --}}
                <div class="bg-[#252525] border border-gray-700 rounded-xl p-6 shadow-lg">
                    <p class="text-sm text-gray-400">
                        Pending Reservations
                    </p>

                    <h2 class="mt-3 text-3xl font-semibold text-yellow-400">
                        {{ $pendingReservations }}
                    </h2>

                    <p class="mt-2 text-xs text-gray-500">
                        Awaiting administrator review
                    </p>

                    <a href="{{ route('admin.reservations.index') }}"
                       class="inline-block mt-5 text-sm text-amber-500 hover:text-amber-400 font-semibold">
                        Review Reservations →
                    </a>
                </div>

            </div>

            {{-- Reservation Overview --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">

                {{-- Total Reservations --}}
                <div class="lg:col-span-2 bg-[#252525] border border-gray-700 rounded-xl p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-amber-500">
                                Booking Overview
                            </p>

                            <h2 class="mt-2 text-2xl font-serif text-[#F5F2EC]">
                                Reservation Activity
                            </h2>

                            <p class="mt-1 text-sm text-gray-400">
                                Total reservations registered in the system.
                            </p>
                        </div>

                        <h2 class="text-4xl font-semibold text-amber-500">
                            {{ $totalReservations }}
                        </h2>
                    </div>

                    <div class="mt-6 pt-5 border-t border-gray-700">
                        <a href="{{ route('admin.reservations.index') }}"
                           class="text-sm font-semibold text-amber-500 hover:text-amber-400">
                            View All Reservations →
                        </a>
                    </div>
                </div>

                {{-- Quick Management --}}
                <div class="bg-[#252525] border border-gray-700 rounded-xl p-6">
                    <p class="text-xs uppercase tracking-widest text-amber-500">
                        Management
                    </p>

                    <h2 class="mt-2 text-2xl font-serif text-[#F5F2EC]">
                        Quick Actions
                    </h2>

                    <div class="mt-5 space-y-3">

                        <a href="{{ route('rooms.create') }}"
                           class="block w-full text-center px-4 py-3 bg-[#D9A85B] text-[#171717] font-semibold rounded-lg hover:bg-[#B58A4A] transition">
                            + Add New Room
                        </a>

                        <a href="{{ route('admin.reservations.index') }}"
                           class="block w-full text-center px-4 py-3 border border-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">
                            Manage Reservations
                        </a>

                        <a href="{{ route('admin.payments.index') }}"
                           class="block w-full text-center px-4 py-3 border border-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">
                            Manage Payments
                        </a>

                        <a href="{{ route('services.index') }}"
                           class="block w-full text-center px-4 py-3 border border-gray-600 text-gray-200 rounded-lg hover:bg-gray-700 transition">
                            Manage Services
                        </a>

                    </div>
                </div>

            </div>

            {{-- Recent Reservations --}}
            <div class="bg-[#252525] border border-gray-700 rounded-xl shadow-xl overflow-hidden">

                <div class="p-6 border-b border-gray-700 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <p class="text-xs uppercase tracking-widest text-amber-500">
                            Latest Bookings
                        </p>

                        <h2 class="mt-2 text-2xl font-serif text-[#F5F2EC]">
                            Recent Reservations
                        </h2>
                    </div>

                    <a href="{{ route('admin.reservations.index') }}"
                       class="text-sm font-semibold text-amber-500 hover:text-amber-400">
                        View All →
                    </a>
                </div>

                @if ($recentReservations->isEmpty())

                    <div class="p-10 text-center">
                        <h3 class="text-lg font-semibold text-[#F5F2EC]">
                            No Reservations Yet
                        </h3>

                        <p class="mt-2 text-sm text-gray-400">
                            Guest reservations will appear here once submitted.
                        </p>
                    </div>

                @else

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">

                            <thead class="bg-[#1B1B1B]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Reservation
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Guest
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Room
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Check-in
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Total
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-700">

                                @foreach ($recentReservations as $reservation)
                                    <tr class="hover:bg-[#303030] transition">

                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-[#F5F2EC]">
                                            #{{ $reservation->id }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="font-medium text-[#F5F2EC]">
                                                {{ $reservation->user->name }}
                                            </div>

                                            <div class="text-sm text-gray-400">
                                                {{ $reservation->user->email }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-[#F5F2EC]">
                                                Room {{ $reservation->room->room_number }}
                                            </div>

                                            <div class="text-sm text-gray-400">
                                                {{ $reservation->room->room_type }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                            {{ \Carbon\Carbon::parse($reservation->check_in)->format('M d, Y') }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-amber-500">
                                            ₱{{ number_format($reservation->total_amount, 2) }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($reservation->status === 'pending')
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-900/40 text-yellow-400 border border-yellow-700">
                                                    Pending
                                                </span>
                                            @elseif ($reservation->status === 'confirmed')
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-900/40 text-green-400 border border-green-700">
                                                    Confirmed
                                                </span>
                                            @elseif ($reservation->status === 'cancelled')
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-900/40 text-red-400 border border-red-700">
                                                    Cancelled
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-700 text-gray-300">
                                                    {{ ucfirst($reservation->status) }}
                                                </span>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                @endif

            </div>

            {{-- Footer --}}
            <p class="text-center text-xs text-gray-600 mt-10">
                MHILLIANA GRAND HOTEL · ADMINISTRATION DASHBOARD
            </p>

        </div>
    </div>
</x-app-layout>
