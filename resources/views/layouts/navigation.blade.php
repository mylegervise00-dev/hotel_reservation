<nav x-data="{ open: false }" class="bg-[#171717] border-b border-[#D9A85B]/30 text-[#F5F2EC]">

    {{-- Desktop Navigation --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center min-h-20">

            {{-- Hotel Branding --}}
            <div class="flex items-center gap-3 shrink-0">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">

                    {{-- MH Monogram --}}
                    <div class="w-11 h-11 border border-[#D9A85B] flex items-center justify-center">
                        <span class="font-serif text-xl text-[#D9A85B] tracking-tight">
                            MH
                        </span>
                    </div>

                    {{-- Hotel Name --}}
                    <div>
                        <p class="font-serif text-base sm:text-lg tracking-[0.12em] text-[#F5F2EC] group-hover:text-[#D9A85B] transition">
                            MHILLIANA
                        </p>

                        <p class="text-[9px] sm:text-[10px] uppercase tracking-[0.35em] text-[#D9A85B]">
                            Grand Hotel
                        </p>
                    </div>

                </a>

            </div>


            {{-- Desktop Navigation Links --}}
            <div class="hidden lg:flex items-center gap-6 xl:gap-8">

                <a href="{{ route('dashboard') }}"
                   class="text-sm transition {{ request()->routeIs('dashboard') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                    Dashboard
                </a>


                @if (Auth::user()->isAdmin())

                    <a href="{{ route('rooms.index') }}"
                       class="text-sm transition {{ request()->routeIs('rooms.*') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                        Rooms
                    </a>

                    <a href="{{ route('admin.reservations.index') }}"
                       class="text-sm transition {{ request()->routeIs('admin.reservations.*') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                        Reservations
                    </a>

                    <a href="{{ route('admin.payments.index') }}"
                       class="text-sm transition {{ request()->routeIs('admin.payments.*') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                        Payments
                    </a>

                    <a href="{{ route('services.index') }}"
                       class="text-sm transition {{ request()->routeIs('services.*') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                        Services
                    </a>

                @else

                    <a href="{{ route('guest.rooms.index') }}"
                       class="text-sm transition {{ request()->routeIs('guest.rooms.*') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                        Available Rooms
                    </a>

                    <a href="{{ route('guest.reservations.index') }}"
                       class="text-sm transition {{ request()->routeIs('guest.reservations.*') ? 'text-[#D9A85B]' : 'text-gray-300 hover:text-[#D9A85B]' }}">
                        My Reservations
                    </a>

                @endif

            </div>


            {{-- Desktop User Dropdown --}}
            <div class="hidden lg:flex items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="flex items-center gap-3 px-4 py-2 border border-white/10 hover:border-[#D9A85B]/60 transition">

                            <div class="w-8 h-8 rounded-full bg-[#D9A85B]/10 border border-[#D9A85B]/50 flex items-center justify-center text-[#D9A85B]">
                                <span class="text-sm font-serif">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>

                            <span class="text-sm text-gray-200">
                                {{ Auth::user()->name }}
                            </span>

                            <svg class="w-4 h-4 text-[#D9A85B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            My Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            {{-- Mobile Hamburger --}}
            <div class="lg:hidden flex items-center">

                <button
                    @click="open = !open"
                    class="p-2 text-[#D9A85B] hover:bg-white/10 transition"
                    aria-label="Toggle navigation"
                    :aria-expanded="open.toString()"
                >

                    <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>

                    <svg x-show="open" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 6l12 12M18 6L6 18"/>
                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- Mobile Navigation --}}
    <div x-show="open" x-cloak x-transition class="lg:hidden border-t border-[#D9A85B]/20 bg-[#202020]">

        <div class="px-5 py-5 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-3 text-sm transition {{ request()->routeIs('dashboard') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                Dashboard
            </a>


            @if (Auth::user()->isAdmin())

                <a href="{{ route('rooms.index') }}"
                   class="block px-4 py-3 text-sm transition {{ request()->routeIs('rooms.*') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                    Room Management
                </a>

                <a href="{{ route('admin.reservations.index') }}"
                   class="block px-4 py-3 text-sm transition {{ request()->routeIs('admin.reservations.*') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                    All Reservations
                </a>

                <a href="{{ route('admin.payments.index') }}"
                   class="block px-4 py-3 text-sm transition {{ request()->routeIs('admin.payments.*') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                    Payment Management
                </a>

                <a href="{{ route('services.index') }}"
                   class="block px-4 py-3 text-sm transition {{ request()->routeIs('services.*') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                    Service Management
                </a>

            @else

                <a href="{{ route('guest.rooms.index') }}"
                   class="block px-4 py-3 text-sm transition {{ request()->routeIs('guest.rooms.*') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                    Available Rooms
                </a>

                <a href="{{ route('guest.reservations.index') }}"
                   class="block px-4 py-3 text-sm transition {{ request()->routeIs('guest.reservations.*') ? 'text-[#D9A85B] bg-[#D9A85B]/10' : 'text-gray-300 hover:text-[#D9A85B] hover:bg-white/5' }}">
                    My Reservations
                </a>

            @endif

        </div>


        {{-- Mobile Account Section --}}
        <div class="border-t border-white/10 px-5 py-5">

            <div class="mb-4">

                <p class="text-[#F5F2EC] font-medium">
                    {{ Auth::user()->name }}
                </p>

                <p class="text-sm text-gray-500 mt-1">
                    {{ Auth::user()->email }}
                </p>

            </div>

            <a href="{{ route('profile.edit') }}"
               class="block px-4 py-3 text-sm text-gray-300 hover:text-[#D9A85B] hover:bg-white/5 transition">
                My Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="w-full text-left px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 transition">
                    Log Out
                </button>
            </form>

        </div>

    </div>

</nav>
