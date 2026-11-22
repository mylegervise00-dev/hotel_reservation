<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-amber-600">
                MHILLIANA GRAND HOTEL
            </p>
            <h2 class="font-serif text-2xl text-gray-900 dark:text-white">
                Reservation Management
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-10 px-4">
        <div class="max-w-7xl mx-auto">

            {{-- Page Heading --}}
            <div class="mb-8">
                <p class="text-sm text-gray-400">
                    Administration / Reservations
                </p>

                <h1 class="mt-2 text-3xl sm:text-4xl font-serif text-[#F5F2EC]">
                    All Reservations
                </h1>

                <p class="mt-2 text-gray-400">
                    Review and manage reservations submitted by hotel guests.
                </p>
            </div>

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg border border-green-700 bg-green-900/30 text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="mb-6 p-4 rounded-lg border border-red-700 bg-red-900/30 text-red-400">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Reservation Count --}}
            <div class="mb-6 bg-[#252525] border border-gray-700 rounded-xl p-5">
                <p class="text-xs uppercase tracking-widest text-gray-400">
                    Total Reservations
                </p>

                <p class="mt-2 text-3xl font-semibold text-amber-500">
                    {{ $reservations->count() }}
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    Reservations recorded in the system
                </p>
            </div>

            {{-- Reservations Table --}}
            @if ($reservations->isEmpty())

                <div class="bg-[#252525] border border-gray-700 rounded-xl p-10 text-center">
                    <h3 class="text-xl font-serif text-[#F5F2EC]">
                        No Reservations Found
                    </h3>

                    <p class="text-gray-400 mt-2">
                        Guest reservations will appear here once submitted.
                    </p>
                </div>

            @else

                <div class="bg-[#252525] border border-gray-700 rounded-xl shadow-xl overflow-hidden">

                    <div class="p-6 border-b border-gray-700">
                        <h2 class="text-xl font-serif text-[#F5F2EC]">
                            Reservation Records
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Review guest bookings and update pending reservation statuses.
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">

                            <thead class="bg-[#1B1B1B]">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Reservation
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Guest
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Room
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Selected Services
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Check-in
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Check-out
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Total
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Status
                                    </th>

                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider text-amber-500">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-700">

                                @foreach ($reservations as $reservation)
                                    <tr class="hover:bg-[#303030] transition">

                                        {{-- Reservation ID --}}
                                        <td class="px-5 py-5 whitespace-nowrap">
                                            <span class="font-semibold text-[#F5F2EC]">
                                                #{{ $reservation->id }}
                                            </span>
                                        </td>

                                        {{-- Guest --}}
                                        <td class="px-5 py-5">
                                            <div class="font-semibold text-[#F5F2EC] whitespace-nowrap">
                                                {{ $reservation->user->name }}
                                            </div>

                                            <div class="text-sm text-gray-400 mt-1">
                                                {{ $reservation->user->email }}
                                            </div>
                                        </td>

                                        {{-- Room --}}
                                        <td class="px-5 py-5 whitespace-nowrap">
                                            <div class="font-medium text-[#F5F2EC]">
                                                Room {{ $reservation->room->room_number }}
                                            </div>

                                            <div class="text-sm text-gray-400 mt-1">
                                                {{ $reservation->room->room_type }}
                                            </div>
                                        </td>

                                        {{-- Selected Services --}}
                                        <td class="px-5 py-5 text-sm min-w-[180px]">
                                            @forelse ($reservation->services as $service)
                                                <div class="mb-2">
                                                    <span class="text-[#F5F2EC] font-medium">
                                                        {{ $service->name }}
                                                    </span>

                                                    <div class="text-gray-400">
                                                        ₱{{ number_format($service->pivot->price, 2) }}
                                                    </div>
                                                </div>
                                            @empty
                                                <span class="text-gray-500 italic">
                                                    No additional services
                                                </span>
                                            @endforelse
                                        </td>

                                        {{-- Check-in --}}
                                        <td class="px-5 py-5 whitespace-nowrap text-gray-300 text-sm">
                                            {{ \Carbon\Carbon::parse($reservation->check_in)->format('M d, Y') }}
                                        </td>

                                        {{-- Check-out --}}
                                        <td class="px-5 py-5 whitespace-nowrap text-gray-300 text-sm">
                                            {{ \Carbon\Carbon::parse($reservation->check_out)->format('M d, Y') }}
                                        </td>

                                        {{-- Total --}}
                                        <td class="px-5 py-5 whitespace-nowrap">
                                            <span class="font-semibold text-amber-500">
                                                ₱{{ number_format($reservation->total_amount, 2) }}
                                            </span>
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-5 py-5 whitespace-nowrap">
                                            @if ($reservation->status === 'pending')
                                                <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-yellow-900/40 text-yellow-400 border border-yellow-700">
                                                    Pending
                                                </span>
                                            @elseif ($reservation->status === 'confirmed')
                                                <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-green-900/40 text-green-400 border border-green-700">
                                                    Confirmed
                                                </span>
                                            @elseif ($reservation->status === 'cancelled')
                                                <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-red-900/40 text-red-400 border border-red-700">
                                                    Cancelled
                                                </span>
                                            @else
                                                <span class="px-3 py-1.5 rounded-full text-xs font-semibold bg-gray-700 text-gray-300">
                                                    {{ ucfirst($reservation->status) }}
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-5 py-5 whitespace-nowrap">
                                            @if ($reservation->status === 'pending')

                                                <div class="flex flex-col gap-3">

                                                    {{-- Confirm --}}
                                                    <form method="POST"
                                                        action="{{ route('admin.reservations.updateStatus', $reservation) }}">

                                                        @csrf
                                                        @method('PATCH')

                                                        <input
                                                            type="hidden"
                                                            name="status"
                                                            value="confirmed">

                                                        <button
                                                            type="submit"
                                                            class="text-green-400 hover:text-green-300 font-semibold transition">
                                                            Confirm
                                                        </button>
                                                    </form>

                                                    {{-- Cancel --}}
                                                    <form method="POST"
                                                        action="{{ route('admin.reservations.updateStatus', $reservation) }}"
                                                        onsubmit="return confirm('Are you sure you want to cancel this reservation?');">

                                                        @csrf
                                                        @method('PATCH')

                                                        <input
                                                            type="hidden"
                                                            name="status"
                                                            value="cancelled">

                                                        <button
                                                            type="submit"
                                                            class="text-red-400 hover:text-red-300 font-semibold transition">
                                                            Cancel
                                                        </button>
                                                    </form>

                                                </div>

                                            @else

                                                <span class="text-sm text-gray-500">
                                                    No action
                                                </span>

                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-700">
                        <p class="text-sm text-gray-500">
                            Showing {{ $reservations->count() }} reservation(s).
                        </p>
                    </div>

                </div>

            @endif

            {{-- Back Link --}}
            <div class="mt-8">
                <a href="{{ route('guest.rooms.index') }}"
                   class="text-amber-500 hover:text-amber-400 font-semibold transition">
                    ← Back to Available Rooms
                </a>
            </div>

            {{-- Footer --}}
            <p class="text-center text-xs text-gray-600 mt-10">
                MHILLIANA GRAND HOTEL · RESERVATION MANAGEMENT
            </p>

        </div>
    </div>
</x-app-layout>
