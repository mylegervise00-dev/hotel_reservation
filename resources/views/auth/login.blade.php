<x-guest-layout>

    <div class="min-h-screen bg-[#171717] flex items-center justify-center px-4 py-12">

        <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 bg-[#252525] border border-white/10 shadow-2xl overflow-hidden">

            {{-- Left Side: Hotel Image --}}
            <div class="relative hidden lg:block min-h-[650px]">

                <img
                    src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=85"
                    alt="MHILLIANA GRAND HOTEL luxury interior"
                    class="absolute inset-0 w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-black/20"></div>

                <div class="absolute bottom-0 left-0 p-12">

                    <p class="text-xs uppercase tracking-[0.4em] text-[#D9A85B]">
                        Welcome to
                    </p>

                    <h1 class="mt-4 text-5xl font-serif text-white leading-tight">
                        MHILLIANA<br>
                        GRAND HOTEL
                    </h1>

                    <div class="w-20 h-px bg-[#D9A85B] mt-6"></div>

                    <p class="mt-6 max-w-sm text-gray-200 leading-relaxed">
                        Experience exceptional comfort, timeless elegance,
                        and a stay designed around you.
                    </p>

                </div>

            </div>


            {{-- Right Side: Login Form --}}
            <div class="flex items-center justify-center p-7 sm:p-12 lg:p-16">

                <div class="w-full max-w-md">

                    {{-- Hotel Branding --}}
                    <div class="text-center mb-10">

                        <p class="text-sm uppercase tracking-[0.35em] text-[#D9A85B] font-semibold">
                            MHILLIANA GRAND HOTEL
                        </p>

                        <div class="w-16 h-px bg-[#D9A85B] mx-auto mt-5"></div>

                        <h2 class="mt-6 text-3xl sm:text-4xl font-serif text-[#F5F2EC]">
                            Welcome Back
                        </h2>

                        <p class="mt-3 text-sm text-gray-400">
                            Sign in to access your guest account.
                        </p>

                    </div>


                    {{-- Session Status --}}
                    <x-auth-session-status
                        class="mb-5 text-sm text-green-400"
                        :status="session('status')"
                    />


                    {{-- Login Form --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email"
                                   class="block text-sm font-medium text-gray-300">
                                Email Address
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Enter your email address"
                                class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                            >

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />
                        </div>


                        {{-- Password --}}
                        <div class="mt-6">

                            <label for="password"
                                   class="block text-sm font-medium text-gray-300">
                                Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="block mt-2 w-full bg-[#171717] border border-gray-700 text-[#F5F2EC] placeholder-gray-500 px-4 py-3 rounded-none focus:border-[#D9A85B] focus:ring-1 focus:ring-[#D9A85B] transition"
                            >

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Remember Me and Forgot Password --}}
                        <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                            <label for="remember_me"
                                   class="inline-flex items-center cursor-pointer">

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="rounded-sm bg-[#171717] border-gray-600 text-[#D9A85B] focus:ring-[#D9A85B]"
                                >

                                <span class="ms-2 text-sm text-gray-400">
                                    Remember me
                                </span>

                            </label>

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm text-[#D9A85B] hover:text-[#F5F2EC] transition"
                                >
                                    Forgot password?
                                </a>
                            @endif

                        </div>


                        {{-- Login Button --}}
                        <button
                            type="submit"
                            class="w-full mt-8 py-4 bg-[#D9A85B] text-[#171717] font-semibold uppercase tracking-[0.2em] text-sm hover:bg-[#B58A4A] transition duration-300"
                        >
                            Sign In
                        </button>

                    </form>


                    {{-- Registration Link --}}
                    @if (Route::has('register'))
                        <div class="mt-8 text-center">

                            <p class="text-sm text-gray-400">
                                Don't have a guest account?

                                <a
                                    href="{{ route('register') }}"
                                    class="text-[#D9A85B] font-semibold hover:text-[#F5F2EC] transition"
                                >
                                    Register Now
                                </a>
                            </p>

                        </div>
                    @endif


                    {{-- Footer --}}
                    <div class="mt-12 text-center border-t border-white/10 pt-6">

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
