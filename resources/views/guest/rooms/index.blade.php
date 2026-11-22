<x-app-layout>
    <div class="min-h-screen bg-[#F5F2EC]">

        <!-- Page Header -->
        <section class="bg-[#171717] px-6 py-16 text-center">
            <p class="text-sm uppercase tracking-[0.35em] text-[#D9A85B]">
                MHILLIANA GRAND HOTEL
            </p>

            <h1 class="mt-4 text-4xl md:text-5xl font-serif text-white">
                Discover Our Rooms
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-gray-300 leading-relaxed">
                Experience comfort, elegance, and exceptional hospitality.
                Find the perfect accommodation for your stay.
            </p>

            <div class="mt-6 mx-auto h-px w-20 bg-[#D9A85B]"></div>
        </section>

        <!-- Room Listings -->
        <section class="max-w-7xl mx-auto px-6 py-14">

            <!-- Introduction -->
            <div class="mb-10">
                <p class="text-sm uppercase tracking-widest text-[#B58A4A]">
                    Accommodation
                </p>

                <h2 class="mt-2 text-3xl font-serif text-[#171717]">
                    Choose Your Perfect Stay
                </h2>

                <p class="mt-3 text-gray-600">
                    Explore our available accommodations and enjoy
                    a relaxing hotel experience.
                </p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <!-- No Rooms Available -->
            @if ($rooms->isEmpty())

                <div class="rounded-xl bg-white p-12 text-center shadow-sm">
                    <h3 class="text-2xl font-serif text-[#171717]">
                        No Available Rooms
                    </h3>

                    <p class="mt-3 text-gray-500">
                        Sorry, there are currently no available rooms.
                        Please check again later.
                    </p>
                </div>

            @else

                <!-- Room Cards -->
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">

                    @foreach ($rooms as $room)

                        @php
                            $roomImages = [
                                'Single' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1000&q=85',
                                'Double' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1000&q=85',
                                'Deluxe' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1000&q=85',
                                'Suite' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1000&q=85',
                            ];

                            $roomImage = $roomImages[$room->room_type]
                                ?? 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1000&q=85';
                        @endphp

                        <article class="group overflow-hidden rounded-xl bg-white shadow-md transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <!-- Room Image -->
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    src="{{ $roomImage }}"
                                    alt="{{ $room->room_type }} Room"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                >

                                <div class="absolute left-4 top-4 rounded-full bg-[#171717]/85 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-[#E8C58B]">
                                    {{ $room->room_type }}
                                </div>
                            </div>

                            <!-- Room Information -->
                            <div class="p-6">

                                <div class="flex items-center justify-between gap-3">
                                    <h3 class="text-2xl font-serif text-[#171717]">
                                        {{ $room->room_type }} Room
                                    </h3>

                                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700">
                                        Available
                                    </span>
                                </div>

                                <p class="mt-2 text-sm text-gray-500">
                                    Room Number: {{ $room->room_number }}
                                </p>

                                <div class="my-5 border-t border-gray-200"></div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-wider text-gray-500">
                                            Price per night
                                        </p>

                                        <p class="mt-1 text-2xl font-semibold text-[#B58A4A]">
                                            ₱{{ number_format($room->price_per_night, 2) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Booking Button -->
                                <a
                                    href="{{ route('guest.reservations.create', $room) }}"
                                    class="mt-6 block w-full rounded-md bg-[#171717] px-5 py-3 text-center text-sm font-semibold uppercase tracking-wider text-white transition hover:bg-[#B58A4A]"
                                >
                                    Book This Room
                                </a>

                            </div>
                        </article>

                    @endforeach

                </div>

            @endif

        </section>

        <!-- Bottom Section -->
        <section class="bg-[#EAE5DC] px-6 py-12 text-center">
            <h2 class="text-3xl font-serif text-[#171717]">
                Your Comfort Is Our Priority
            </h2>

            <p class="mx-auto mt-3 max-w-xl text-gray-600">
                We look forward to welcoming you to MHILLIANA GRAND HOTEL.
            </p>
        </section>

    </div>
</x-app-layout>
