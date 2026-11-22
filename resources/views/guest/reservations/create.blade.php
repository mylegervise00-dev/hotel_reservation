<x-app-layout>

    <div class="min-h-screen bg-[#F5F2EC]">

        <!-- Page Header -->
        <section class="bg-[#171717] px-6 py-14 text-center">
            <p class="text-sm uppercase tracking-[0.35em] text-[#D9A85B]">
                MHILLIANA GRAND HOTEL
            </p>

            <h1 class="mt-4 text-4xl font-serif text-white md:text-5xl">
                Reserve Your Stay
            </h1>

            <p class="mt-4 text-gray-300">
                Complete your booking and prepare for a memorable experience.
            </p>

            <div class="mx-auto mt-6 h-px w-20 bg-[#D9A85B]"></div>
        </section>

        <section class="mx-auto max-w-5xl px-6 py-12">

            <div class="mb-8">
                <p class="text-sm uppercase tracking-widest text-[#B58A4A]">
                    Reservation
                </p>

                <h2 class="mt-2 text-3xl font-serif text-[#171717]">
                    Complete Your Reservation
                </h2>

                <p class="mt-2 text-gray-600">
                    Select your preferred dates and additional hotel services.
                </p>
            </div>

            <!-- Booking Card -->
            <div class="overflow-hidden rounded-xl bg-white shadow-lg">

                <!-- Selected Room -->
                <div class="bg-[#252525] p-7 text-white md:p-9">

                    <p class="text-sm font-semibold uppercase tracking-widest text-[#D9A85B]">
                        Your Selected Room
                    </p>

                    <div class="mt-4 flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

                        <div>
                            <h3 class="text-3xl font-serif">
                                {{ $room->room_type }} Room
                            </h3>

                            <p class="mt-2 text-gray-300">
                                Room Number: {{ $room->room_number }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-400">
                                Price per night
                            </p>

                            <p class="mt-1 text-3xl font-semibold text-[#E8C58B]">
                                ₱{{ number_format($room->price_per_night, 2) }}
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Booking Form -->
                <form method="POST"
                      action="{{ route('guest.reservations.store', $room) }}"
                      class="p-6 md:p-9">

                    @csrf

                    <!-- Stay Dates -->
                    <div>
                        <h3 class="text-xl font-serif text-[#171717]">
                            Your Stay
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Choose when you would like to arrive and depart.
                        </p>

                        <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">

                            <!-- Check-in -->
                            <div>
                                <label for="check_in"
                                       class="mb-2 block text-sm font-semibold text-gray-700">
                                    Check-in Date
                                </label>

                                <input
                                    type="date"
                                    id="check_in"
                                    name="check_in"
                                    value="{{ old('check_in') }}"
                                    min="{{ now()->toDateString() }}"
                                    required
                                    class="w-full rounded-lg border-gray-300 px-4 py-3 focus:border-[#B58A4A] focus:ring-[#B58A4A]"
                                >

                                @error('check_in')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Check-out -->
                            <div>
                                <label for="check_out"
                                       class="mb-2 block text-sm font-semibold text-gray-700">
                                    Check-out Date
                                </label>

                                <input
                                    type="date"
                                    id="check_out"
                                    name="check_out"
                                    value="{{ old('check_out') }}"
                                    min="{{ now()->addDay()->toDateString() }}"
                                    required
                                    class="w-full rounded-lg border-gray-300 px-4 py-3 focus:border-[#B58A4A] focus:ring-[#B58A4A]"
                                >

                                @error('check_out')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Optional Services -->
                    <div class="mt-10 border-t border-gray-200 pt-8">

                        <h3 class="text-xl font-serif text-[#171717]">
                            Additional Hotel Services
                        </h3>

                        <p class="mt-1 text-sm text-gray-500">
                            Enhance your stay with our optional services.
                        </p>

                        @if ($services->isEmpty())

                            <p class="mt-5 rounded-lg bg-gray-50 p-4 text-gray-500">
                                No additional services are currently available.
                            </p>

                        @else

                            <div class="mt-5 space-y-3">

                                @foreach ($services as $service)

                                    <label class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-200 p-4 transition hover:border-[#B58A4A] hover:bg-[#FAF8F4]">

                                        <div class="flex items-center gap-3">

                                            <input
                                                type="checkbox"
                                                name="services[]"
                                                value="{{ $service->id }}"
                                                class="service-checkbox h-5 w-5 rounded border-gray-300 text-[#B58A4A] focus:ring-[#B58A4A]"
                                                data-price="{{ $service->price }}"
                                            >

                                            <div>
                                                <p class="font-semibold text-[#171717]">
                                                    {{ $service->name }}
                                                </p>

                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $service->description }}
                                                </p>
                                            </div>

                                        </div>

                                        <span class="whitespace-nowrap font-semibold text-[#B58A4A]">
                                            ₱{{ number_format($service->price, 2) }}
                                        </span>

                                    </label>

                                @endforeach

                            </div>

                        @endif

                        @error('services')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Reservation Summary -->
                    <div class="mt-10 rounded-xl bg-[#F5F2EC] p-6 md:p-7">

                        <p class="text-sm font-semibold uppercase tracking-widest text-[#B58A4A]">
                            Booking Summary
                        </p>

                        <h3 class="mt-2 text-2xl font-serif text-[#171717]">
                            Reservation Cost
                        </h3>

                        <div class="mt-6 space-y-4">

                            <div class="flex justify-between text-gray-600">
                                <span>Number of Nights</span>
                                <span id="nights" class="font-semibold text-[#171717]">
                                    0
                                </span>
                            </div>

                            <div class="flex justify-between text-gray-600">
                                <span>Price per Night</span>
                                <span class="font-semibold text-[#171717]">
                                    ₱{{ number_format($room->price_per_night, 2) }}
                                </span>
                            </div>

                        </div>

                        <div class="mt-5 border-t border-gray-300 pt-5">

                            <div class="flex items-center justify-between gap-3">

                                <span class="font-semibold text-[#171717]">
                                    Estimated Total
                                </span>

                                <span id="total" class="text-2xl font-bold text-[#B58A4A]">
                                    ₱0.00
                                </span>

                            </div>

                            <p class="mt-3 text-xs text-gray-500">
                                The final amount will be saved when you submit your reservation.
                            </p>

                        </div>

                    </div>

                    @error('room')
                        <p class="mt-4 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                    <!-- Form Buttons -->
                    <div class="mt-8 flex flex-col-reverse justify-between gap-4 sm:flex-row sm:items-center">

                        <a href="{{ route('guest.rooms.index') }}"
                           class="text-center font-semibold text-gray-500 transition hover:text-[#B58A4A]">
                            ← Back to Rooms
                        </a>

                        <button
                            type="submit"
                            class="rounded-md bg-[#171717] px-8 py-3 font-semibold uppercase tracking-wider text-white transition hover:bg-[#B58A4A]"
                        >
                            Submit Reservation
                        </button>

                    </div>

                </form>

            </div>

        </section>

    </div>

    <!-- Automatic Price Calculator -->
    <script>
        const checkIn = document.getElementById('check_in');
        const checkOut = document.getElementById('check_out');
        const nightsDisplay = document.getElementById('nights');
        const totalDisplay = document.getElementById('total');

        const pricePerNight = Number(@json($room->price_per_night));

        function calculateTotal() {
            const start = checkIn.value;
            const end = checkOut.value;

            if (!start || !end) {
                nightsDisplay.textContent = '0';
                totalDisplay.textContent = '₱0.00';
                return;
            }

            const startDate = new Date(start + 'T00:00:00');
            const endDate = new Date(end + 'T00:00:00');

            const difference = endDate - startDate;
            const nights = difference / (1000 * 60 * 60 * 24);

            if (nights <= 0) {
                nightsDisplay.textContent = '0';
                totalDisplay.textContent = '₱0.00';
                return;
            }

            const selectedServices = document.querySelectorAll('.service-checkbox:checked');

            let serviceTotal = 0;

            selectedServices.forEach(function (service) {
                serviceTotal += Number(service.dataset.price);
            });

            const roomTotal = nights * pricePerNight;
            const total = roomTotal + serviceTotal;

            nightsDisplay.textContent = nights;
            totalDisplay.textContent = '₱' + total.toFixed(2);
        }

        checkIn.addEventListener('change', function () {
            if (checkIn.value) {
                const nextDay = new Date(checkIn.value + 'T00:00:00');
                nextDay.setDate(nextDay.getDate() + 1);

                const minimumCheckout = [
                    nextDay.getFullYear(),
                    String(nextDay.getMonth() + 1).padStart(2, '0'),
                    String(nextDay.getDate()).padStart(2, '0')
                ].join('-');

                checkOut.min = minimumCheckout;

                if (checkOut.value && checkOut.value < minimumCheckout) {
                    checkOut.value = '';
                }
            }

            calculateTotal();
        });

        checkOut.addEventListener('change', calculateTotal);

        document.querySelectorAll('.service-checkbox').forEach(function (checkbox) {
            checkbox.addEventListener('change', calculateTotal);
        });

        calculateTotal();
    </script>

</x-app-layout>
