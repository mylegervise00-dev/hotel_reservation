<x-app-layout>

    <div class="min-h-screen bg-[#F5F2EC]">

        <!-- Page Header -->
        <section class="bg-[#171717] px-6 py-14 text-center">
            <p class="text-sm uppercase tracking-[0.35em] text-[#D9A85B]">
                MHILLIANA GRAND HOTEL
            </p>

            <h1 class="mt-4 text-4xl font-serif text-white md:text-5xl">
                My Reservations
            </h1>

            <p class="mt-4 text-gray-300">
                Manage your bookings and keep track of your hotel stays.
            </p>

            <div class="mx-auto mt-6 h-px w-20 bg-[#D9A85B]"></div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-12">

            <!-- Introduction -->
            <div class="mb-8">
                <p class="text-sm uppercase tracking-widest text-[#B58A4A]">
                    Guest Account
                </p>

                <h2 class="mt-2 text-3xl font-serif text-[#171717]">
                    Your Booking History
                </h2>

                <p class="mt-2 text-gray-600">
                    View your reservation details, payment status, and available actions.
                </p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-800">
                    {{ session('error') }}
                </div>
            @endif

            @if ($reservations->isEmpty())

                <!-- Empty State -->
                <div class="rounded-xl bg-white p-12 text-center shadow-sm">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#F5F2EC] text-3xl text-[#B58A4A]">
                        ♡
                    </div>

                    <h3 class="mt-5 text-2xl font-serif text-[#171717]">
                        No Reservations Yet
                    </h3>

                    <p class="mx-auto mt-3 max-w-md text-gray-500">
                        You haven't made any hotel reservations yet.
                        Explore our rooms and find the perfect accommodation for your stay.
                    </p>

                    <a href="{{ route('guest.rooms.index') }}"
                       class="mt-7 inline-block rounded-md bg-[#171717] px-7 py-3 font-semibold text-white transition hover:bg-[#B58A4A]">
                        Browse Available Rooms
                    </a>

                </div>

            @else

                <!-- Reservation Cards -->
                <div class="space-y-7">

                    @foreach ($reservations as $reservation)

                        <article class="overflow-hidden rounded-xl bg-white shadow-md">

                            <!-- Card Header -->
                            <div class="flex flex-col justify-between gap-4 border-b border-gray-100 bg-[#252525] p-6 sm:flex-row sm:items-center">

                                <div>
                                    <p class="text-xs uppercase tracking-widest text-[#D9A85B]">
                                        Reservation Reference
                                    </p>

                                    <h3 class="mt-2 text-2xl font-serif text-white">
                                        Booking #{{ $reservation->id }}
                                    </h3>
                                </div>

                                <div>
                                    @if ($reservation->status === 'pending')
                                        <span class="inline-block rounded-full bg-yellow-100 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-yellow-800">
                                            Pending
                                        </span>

                                    @elseif ($reservation->status === 'confirmed')
                                        <span class="inline-block rounded-full bg-green-100 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-green-800">
                                            Confirmed
                                        </span>

                                    @elseif ($reservation->status === 'cancelled')
                                        <span class="inline-block rounded-full bg-red-100 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-red-800">
                                            Cancelled
                                        </span>

                                    @else
                                        <span class="inline-block rounded-full bg-gray-100 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-gray-700">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    @endif
                                </div>

                            </div>

                            <!-- Reservation Details -->
                            <div class="grid grid-cols-1 gap-8 p-6 md:grid-cols-2 md:p-8">

                                <!-- Left Column -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-widest text-[#B58A4A]">
                                        Accommodation
                                    </p>

                                    <h4 class="mt-3 text-2xl font-serif text-[#171717]">
                                        {{ $reservation->room->room_type }} Room
                                    </h4>

                                    <p class="mt-1 text-gray-500">
                                        Room Number: {{ $reservation->room->room_number }}
                                    </p>

                                    <div class="mt-7 grid grid-cols-2 gap-5">

                                        <div>
                                            <p class="text-xs uppercase tracking-wider text-gray-400">
                                                Check-in
                                            </p>

                                            <p class="mt-2 font-semibold text-[#171717]">
                                                {{ \Carbon\Carbon::parse($reservation->check_in)->format('M d, Y') }}
                                            </p>
                                        </div>

                                        <div>
                                            <p class="text-xs uppercase tracking-wider text-gray-400">
                                                Check-out
                                            </p>

                                            <p class="mt-2 font-semibold text-[#171717]">
                                                {{ \Carbon\Carbon::parse($reservation->check_out)->format('M d, Y') }}
                                            </p>
                                        </div>

                                    </div>

                                </div>

                                <!-- Right Column -->
                                <div>

                                    <p class="text-xs font-semibold uppercase tracking-widest text-[#B58A4A]">
                                        Additional Services
                                    </p>

                                    <div class="mt-4 space-y-3">

                                        @forelse ($reservation->services as $service)

                                            <div class="flex justify-between gap-3 text-sm">

                                                <span class="text-gray-700">
                                                    {{ $service->name }}
                                                </span>

                                                <span class="font-semibold text-[#171717]">
                                                    ₱{{ number_format($service->pivot->price, 2) }}
                                                </span>

                                            </div>

                                        @empty

                                            <p class="text-sm text-gray-400">
                                                No additional services selected.
                                            </p>

                                        @endforelse

                                    </div>

                                    <div class="mt-7 border-t border-gray-200 pt-5">

                                        <p class="text-xs uppercase tracking-wider text-gray-400">
                                            Total Reservation Amount
                                        </p>

                                        <p class="mt-2 text-3xl font-bold text-[#B58A4A]">
                                            ₱{{ number_format($reservation->total_amount, 2) }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col justify-between gap-4 border-t border-gray-100 bg-[#FAF8F4] px-6 py-5 sm:flex-row sm:items-center sm:px-8">

                                <p class="text-sm text-gray-500">
                                    Reservation #{{ $reservation->id }}
                                </p>

                                <div class="flex flex-wrap items-center gap-3">

                                    @if ($reservation->status === 'pending')

                                        <form method="POST"
                                              action="{{ route('guest.reservations.cancel', $reservation) }}"
                                              onsubmit="return confirm('Are you sure you want to cancel this reservation?');">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="rounded-md border border-red-200 px-5 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50"
                                            >
                                                Cancel Reservation
                                            </button>

                                        </form>

                                    @elseif ($reservation->status === 'confirmed')

                                        @if ($reservation->payments->isEmpty())

                                            <a href="{{ route('guest.payments.create', $reservation) }}"
                                               class="rounded-md bg-[#171717] px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-[#B58A4A]">
                                                Pay Now
                                            </a>

                                        @else

                                            <span class="rounded-md bg-green-50 px-5 py-2.5 text-sm font-semibold text-green-700">
                                                ✓ Paid (Simulated)
                                            </span>

                                        @endif

                                    @else

                                        <span class="text-sm text-gray-400">
                                            No available actions
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            @endif

            <!-- Browse Rooms -->
            <div class="mt-8">
                <a href="{{ route('guest.rooms.index') }}"
                   class="font-semibold text-[#B58A4A] transition hover:text-[#171717]">
                    ← Browse Available Rooms
                </a>
            </div>

        </section>

    </div>

</x-app-layout>
