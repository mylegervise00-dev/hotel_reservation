<x-guest-layout>

    <div class="min-h-screen bg-[#171717] flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 bg-[#252525] border border-white/10 shadow-2xl overflow-hidden">

            {{-- Left Side: Hotel Image --}}
            <div class="relative hidden lg:block min-h-full">

                <img
                    src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=1200&q=85"
                    alt="MHILLIANA GRAND HOTEL"
                    class="absolute inset-0 w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-black/20"></div>

                <div class="absolute bottom-0 left-0 p-12">

                    <p class="text-xs uppercase tracking-[0.4em] text-[#D9A85B]">
                        Begin Your Journey
                    </p>

                    <h1 class="mt-4 text-5xl font-serif text-white leading-tight">
                        MHILLIANA<br>
                        GRAND HOTEL
                    </h1>

                    <div class="w-20 h-px bg-[#D9A85B] mt-6"></div>

                    <p class="mt-6 max-w-sm text-gray-200 leading-relaxed">
                        Create your guest account and discover a world of
                        comfort, relaxation, and memorable hotel experiences.
                    </p>

                </div>

            </div>


            {{-- Right Side: Registration Form --}}
            <div class="flex items-center justify-center p-7 sm:p-10 lg:p-12">

                <div class="w-full max-w-xl">

                    {{-- Heading --}}
                    <div class="mb-8">

                        <p class="text-sm uppercase tracking-[0.35em] text-[#D9A85B] font-semibold">
                            MHILLIANA GRAND HOTEL
                        </p>

                        <div class="w-16 h-px bg-[#D9A85B] mt-5"></div>

                        <h2 class="mt-6 text-3xl sm:text-4xl font-serif text-[#F5F2EC]">
                            Create Your Account
                        </h2>

                        <p class="mt-3 text-sm text-gray-400">
                            Join us and prepare for a comfortable stay.
                        </p>

                    </div>


                    {{-- Registration Form --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            {{-- Full Name --}}
                            <div class="sm:col-span-2">

                                <label for="name" class="block text-sm font-medium text-gray-300">
                                    Full Name
                                </label>

                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Enter your full name"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                                >

                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            </div>


                            {{-- Email --}}
                            <div>

                                <label for="email" class="block text-sm font-medium text-gray-300">
                                    Email Address
                                </label>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="username"
                                    placeholder="Enter your email"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                                >

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>


                            {{-- Phone --}}
                            <div>

                                <label for="phone" class="block text-sm font-medium text-gray-300">
                                    Phone Number
                                </label>

                                <input
                                    id="phone"
                                    type="tel"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                    placeholder="Enter phone number"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                                >

                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                            </div>


                            {{-- Address --}}
                            <div class="sm:col-span-2">

                                <label for="address" class="block text-sm font-medium text-gray-300">
                                    Address
                                </label>

                                <textarea
                                    id="address"
                                    name="address"
                                    rows="2"
                                    placeholder="Enter your complete address"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                                >{{ old('address') }}</textarea>

                                <x-input-error :messages="$errors->get('address')" class="mt-2" />

                            </div>


                            {{-- Date of Birth --}}
                            <div class="sm:col-span-2">

                                <label for="date_of_birth" class="block text-sm font-medium text-gray-300">
                                    Date of Birth
                                </label>

                                <input
                                    id="date_of_birth"
                                    type="date"
                                    name="date_of_birth"
                                    value="{{ old('date_of_birth') }}"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition [color-scheme:dark]"
                                >

                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />

                            </div>


                            {{-- Password --}}
                            <div>

                                <label for="password" class="block text-sm font-medium text-gray-300">
                                    Password
                                </label>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Create a password"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                                >

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>


                            {{-- Confirm Password --}}
                            <div>

                                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">
                                    Confirm Password
                                </label>

                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Repeat your password"
                                    class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                                >

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                            </div>

                        </div>


                        {{-- Register Button --}}
                        <button
                            type="submit"
                            class="w-full mt-8 py-4 bg-[#D9A85B] text-[#171717] font-semibold uppercase tracking-[0.2em] text-sm hover:bg-[#B58A4A] transition duration-300"
                        >
                            Create Guest Account
                        </button>

                    </form>


                    {{-- Login Link --}}
                    <div class="mt-7 text-center">

                        <p class="text-sm text-gray-400">
                            Already have an account?

                            <a
                                href="{{ route('login') }}"
                                class="text-[#D9A85B] font-semibold hover:text-[#F5F2EC] transition"
                            >
                                Sign In
                            </a>
                        </p>

                    </div>


                    {{-- Footer --}}
                    <div class="mt-10 text-center border-t border-white/10 pt-6">

                        <p class="text-xs uppercase tracking-[0.2em] text-gray-500">
                            Your Comfort, Our Priority
                        </p>

                        <p class="mt-3 text-xs text-gray-600">
                            © {{ date('Y') }} MHILLIANA GRAND HOTEL
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
