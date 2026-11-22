<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-amber-600">
                MHILLIANA GRAND HOTEL
            </p>
            <h2 class="mt-1 font-serif text-2xl text-gray-900 dark:text-white">
                Welcome, {{ auth()->user()->name }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#171717] text-[#F5F2EC]">

        {{-- Luxury Hero Section --}}
        <section class="relative min-h-[540px] flex items-center overflow-hidden">
            <img
                src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=2000&q=85"
                alt="Luxury hotel resort"
                class="absolute inset-0 w-full h-full object-cover"
            >

            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/20"></div>

            <div class="relative z-10 max-w-7xl mx-auto w-full px-6 py-24">
                <div class="max-w-2xl">

                    <p class="text-sm uppercase tracking-[0.35em] text-[#D9A85B]">
                        A stay beyond expectations
                    </p>

                    <h1 class="mt-6 text-4xl sm:text-6xl lg:text-7xl font-serif leading-tight">
                        Discover the Art of
                        <span class="text-[#D9A85B] italic">Luxury Living.</span>
                    </h1>

                    <p class="mt-6 max-w-xl text-gray-200 leading-relaxed text-base sm:text-lg">
                        Welcome back, {{ auth()->user()->name }}.
                        Experience exceptional comfort, beautiful accommodations,
                        and memorable moments at MHILLIANA GRAND HOTEL.
                    </p>

                    <a href="{{ route('guest.rooms.index') }}"
                       class="inline-block mt-9 px-8 py-4 bg-[#D9A85B] text-[#171717] uppercase tracking-wider text-sm font-semibold hover:bg-[#B58A4A] transition duration-300">
                        Discover Our Rooms
                    </a>

                </div>
            </div>

            <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-[#171717] to-transparent"></div>
        </section>


        {{-- Introduction --}}
        <section class="max-w-7xl mx-auto px-6 pt-16 pb-10 text-center">

            <p class="text-xs uppercase tracking-[0.35em] text-[#D9A85B]">
                The MHILLIANA Experience
            </p>

            <h2 class="mt-4 text-3xl sm:text-4xl font-serif">
                Where Elegance Meets Comfort
            </h2>

            <p class="mt-5 max-w-2xl mx-auto text-gray-400 leading-relaxed">
                Every stay deserves something special. Explore our accommodations
                and enjoy a relaxing experience designed around your comfort.
            </p>

            <div class="w-20 h-px bg-[#D9A85B] mx-auto mt-8"></div>

        </section>


        {{-- Featured Accommodations --}}
        <section class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">

                <div>
                    <p class="text-xs uppercase tracking-[0.3em] text-[#D9A85B]">
                        Stay in Style
                    </p>

                    <h2 class="mt-2 text-3xl font-serif">
                        Discover Our Accommodations
                    </h2>

                    <p class="mt-3 text-gray-400 text-sm">
                        Find the perfect space for your next stay.
                    </p>
                </div>

                <a href="{{ route('guest.rooms.index') }}"
                   class="text-sm text-[#D9A85B] hover:text-[#F5F2EC] transition">
                    View Available Rooms →
                </a>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-7">

                {{-- Featured Room 1 --}}
                <div class="group bg-[#252525] border border-white/10 overflow-hidden hover:border-[#D9A85B]/60 transition duration-300">

                    <div class="h-64 overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=900&q=85"
                            alt="Elegant luxury hotel bedroom"
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                        >
                    </div>

                    <div class="p-6">
                        <p class="text-xs uppercase tracking-[0.2em] text-[#D9A85B]">
                            Comfort & Simplicity
                        </p>

                        <h3 class="mt-3 text-2xl font-serif">
                            Single Room
                        </h3>

                        <p class="mt-3 text-sm text-gray-400 leading-relaxed">
                            A welcoming space designed for a peaceful and comfortable stay.
                        </p>

                        <a href="{{ route('guest.rooms.index') }}"
                           class="inline-block mt-6 text-sm text-[#D9A85B] hover:text-white transition">
                            Explore Rooms →
                        </a>
                    </div>

                </div>


                {{-- Featured Room 2 --}}
                <div class="group bg-[#252525] border border-white/10 overflow-hidden hover:border-[#D9A85B]/60 transition duration-300">

                    <div class="h-64 overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=900&q=85"
                            alt="Beautiful hotel guest room"
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                        >
                    </div>

                    <div class="p-6">
                        <p class="text-xs uppercase tracking-[0.2em] text-[#D9A85B]">
                            Relaxation & Space
                        </p>

                        <h3 class="mt-3 text-2xl font-serif">
                            Deluxe Room
                        </h3>

                        <p class="mt-3 text-sm text-gray-400 leading-relaxed">
                            Enjoy an elevated accommodation experience with elegant surroundings.
                        </p>

                        <a href="{{ route('guest.rooms.index') }}"
                           class="inline-block mt-6 text-sm text-[#D9A85B] hover:text-white transition">
                            Explore Rooms →
                        </a>
                    </div>

                </div>


                {{-- Featured Room 3 --}}
                <div class="group bg-[#252525] border border-white/10 overflow-hidden hover:border-[#D9A85B]/60 transition duration-300">

                    <div class="h-64 overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=900&q=85"
                            alt="Luxury resort swimming pool"
                            loading="lazy"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                        >
                    </div>

                    <div class="p-6">
                        <p class="text-xs uppercase tracking-[0.2em] text-[#D9A85B]">
                            Luxury & Exclusivity
                        </p>

                        <h3 class="mt-3 text-2xl font-serif">
                            Suite Experience
                        </h3>

                        <p class="mt-3 text-sm text-gray-400 leading-relaxed">
                            Discover a more spacious and memorable hotel experience.
                        </p>

                        <a href="{{ route('guest.rooms.index') }}"
                           class="inline-block mt-6 text-sm text-[#D9A85B] hover:text-white transition">
                            Explore Rooms →
                        </a>
                    </div>

                </div>

            </div>

            <p class="mt-6 text-xs text-gray-500">
                Featured images are for presentation. Actual room availability and room types
                are displayed on the room browsing page.
            </p>

        </section>


        {{-- Guest Services --}}
        <section class="max-w-7xl mx-auto px-6 py-16">

            <div class="text-center mb-10">
                <p class="text-xs uppercase tracking-[0.3em] text-[#D9A85B]">
                    Your Stay, Your Way
                </p>

                <h2 class="mt-3 text-3xl font-serif">
                    Manage Your Experience
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                {{-- Browse Rooms --}}
                <a href="{{ route('guest.rooms.index') }}"
                   class="group flex items-center gap-5 p-7 bg-[#252525] border border-white/10 hover:border-[#D9A85B] transition">

                    <div class="text-3xl text-[#D9A85B]">⌂</div>

                    <div>
                        <h3 class="font-serif text-xl group-hover:text-[#D9A85B] transition">
                            Browse Rooms
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Find your ideal accommodation.
                        </p>
                    </div>

                    <span class="ml-auto text-[#D9A85B]">→</span>
                </a>


                {{-- Reservations --}}
                <a href="{{ route('guest.reservations.index') }}"
                   class="group flex items-center gap-5 p-7 bg-[#252525] border border-white/10 hover:border-[#D9A85B] transition">

                    <div class="text-3xl text-[#D9A85B]">▤</div>

                    <div>
                        <h3 class="font-serif text-xl group-hover:text-[#D9A85B] transition">
                            My Reservations
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Review your bookings.
                        </p>
                    </div>

                    <span class="ml-auto text-[#D9A85B]">→</span>
                </a>


                {{-- Profile --}}
                <a href="{{ route('profile.edit') }}"
                   class="group flex items-center gap-5 p-7 bg-[#252525] border border-white/10 hover:border-[#D9A85B] transition">

                    <div class="text-3xl text-[#D9A85B]">♙</div>

                    <div>
                        <h3 class="font-serif text-xl group-hover:text-[#D9A85B] transition">
                            My Profile
                        </h3>
                        <p class="mt-1 text-sm text-gray-400">
                            Manage your account details.
                        </p>
                    </div>

                    <span class="ml-auto text-[#D9A85B]">→</span>
                </a>

            </div>

        </section>


        {{-- Guest Account --}}
        <section class="max-w-7xl mx-auto px-6 pb-16">

            <div class="bg-[#252525] border border-white/10 p-7 sm:p-10">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

                    <div>
                        <p class="text-xs uppercase tracking-[0.3em] text-[#D9A85B]">
                            Guest Account
                        </p>

                        <h2 class="mt-3 text-2xl font-serif">
                            Your Personal Information
                        </h2>

                        <div class="mt-5 space-y-2 text-sm text-gray-400">
                            <p>
                                Guest Name:
                                <span class="text-[#F5F2EC]">
                                    {{ auth()->user()->name }}
                                </span>
                            </p>

                            <p>
                                Email Address:
                                <span class="text-[#F5F2EC]">
                                    {{ auth()->user()->email }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <a href="{{ route('profile.edit') }}"
                       class="inline-block text-center px-7 py-3 border border-[#D9A85B] text-[#D9A85B] hover:bg-[#D9A85B] hover:text-[#171717] transition">
                        Update My Profile
                    </a>

                </div>

            </div>

        </section>


        {{-- Footer --}}
        <footer class="border-t border-white/10 py-8 px-6 text-center">

            <p class="font-serif text-lg tracking-widest text-[#D9A85B]">
                MHILLIANA GRAND HOTEL
            </p>

            <p class="mt-2 text-xs tracking-wider text-gray-500">
                YOUR COMFORT, OUR PRIORITY
            </p>

            <p class="mt-5 text-xs text-gray-600">
                © {{ date('Y') }} MHILLIANA GRAND HOTEL. All rights reserved.
            </p>

        </footer>

    </div>
</x-app-layout>
