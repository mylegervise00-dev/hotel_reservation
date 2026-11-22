<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl font-semibold text-[#D9A85B]">
            Reservation Payment
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-12 px-4">
        <div class="max-w-3xl mx-auto">

            <div class="mb-8 text-center">
                <p class="text-sm tracking-[0.35em] text-[#D9A85B] uppercase">
                    MHILLIANA GRAND HOTEL
                </p>

                <h1 class="font-serif text-4xl text-[#F5F2EC] mt-3">
                    Complete Your Payment
                </h1>

                <p class="text-gray-400 mt-2">
                    Review your reservation and select your preferred payment method.
                </p>
            </div>

            <div class="bg-[#252525] border border-[#494034] rounded-2xl shadow-xl overflow-hidden">

                <!-- Reservation Details -->
                <div class="p-6 sm:p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-serif text-2xl text-[#F5F2EC]">
                            Payment Details
                        </h3>

                        <span class="text-xs tracking-wider uppercase text-[#D9A85B] border border-[#80623C] px-3 py-1 rounded-full">
                            Reservation #{{ $reservation->id }}
                        </span>
                    </div>

                    <div class="bg-[#1B1B1B] rounded-xl p-5 space-y-4">

                        <div class="flex justify-between gap-4">
                            <span class="text-gray-400">Room</span>
                            <span class="text-[#F5F2EC] font-medium text-right">
                                {{ $reservation->room->room_number }}
                                ({{ $reservation->room->room_type }})
                            </span>
                        </div>

                        <div class="border-t border-gray-700"></div>

                        <div class="flex justify-between gap-4">
                            <span class="text-gray-400">Check-in</span>
                            <span class="text-[#F5F2EC] text-right">
                                {{ $reservation->check_in }}
                            </span>
                        </div>

                        <div class="flex justify-between gap-4">
                            <span class="text-gray-400">Check-out</span>
                            <span class="text-[#F5F2EC] text-right">
                                {{ $reservation->check_out }}
                            </span>
                        </div>

                        <div class="border-t border-gray-700"></div>

                        <div class="flex justify-between items-center gap-4 pt-1">
                            <span class="text-gray-300 font-medium">
                                Total Amount
                            </span>

                            <span class="text-2xl font-bold text-[#D9A85B]">
                                ₱{{ number_format($reservation->total_amount, 2) }}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="border-t border-[#494034]"></div>

                <!-- Payment Form -->
                <form method="POST"
                    action="{{ route('guest.payments.store', $reservation) }}"
                    class="p-6 sm:p-8">

                    @csrf

                    <h3 class="font-serif text-2xl text-[#F5F2EC] mb-2">
                        Select Payment Method
                    </h3>

                    <p class="text-sm text-gray-400 mb-6">
                        Choose how you would like to pay for your reservation.
                    </p>

                    <div class="space-y-4">

                        <label class="flex items-center gap-4 p-5 rounded-xl border border-gray-600 bg-[#1B1B1B] hover:border-[#D9A85B] cursor-pointer transition">
                            <input
                                type="radio"
                                name="payment_method"
                                value="gcash"
                                required
                                class="h-5 w-5 accent-[#D9A85B]"
                                {{ old('payment_method') === 'gcash' ? 'checked' : '' }}
                            >

                            <div>
                                <p class="text-[#F5F2EC] font-semibold">
                                    GCash
                                </p>
                                <p class="text-sm text-gray-400">
                                    Simulated digital payment
                                </p>
                            </div>
                        </label>

                        <label class="flex items-center gap-4 p-5 rounded-xl border border-gray-600 bg-[#1B1B1B] hover:border-[#D9A85B] cursor-pointer transition">
                            <input
                                type="radio"
                                name="payment_method"
                                value="cash"
                                class="h-5 w-5 accent-[#D9A85B]"
                                {{ old('payment_method') === 'cash' ? 'checked' : '' }}
                            >

                            <div>
                                <p class="text-[#F5F2EC] font-semibold">
                                    Cash at Hotel
                                </p>
                                <p class="text-sm text-gray-400">
                                    Pay directly at the hotel.
                                </p>
                            </div>
                        </label>

                        <label class="flex items-center gap-4 p-5 rounded-xl border border-gray-600 bg-[#1B1B1B] hover:border-[#D9A85B] cursor-pointer transition">
                            <input
                                type="radio"
                                name="payment_method"
                                value="bank_transfer"
                                class="h-5 w-5 accent-[#D9A85B]"
                                {{ old('payment_method') === 'bank_transfer' ? 'checked' : '' }}
                            >

                            <div>
                                <p class="text-[#F5F2EC] font-semibold">
                                    Bank Transfer
                                </p>
                                <p class="text-sm text-gray-400">
                                    Simulated bank transfer payment
                                </p>
                            </div>
                        </label>

                    </div>

                    @error('payment_method')
                        <p class="text-red-400 text-sm mt-3">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="mt-8 flex flex-col sm:flex-row gap-3">

                        <a href="{{ route('guest.reservations.index') }}"
                            class="flex-1 text-center border border-gray-500 text-gray-300 hover:bg-[#333333] px-6 py-3 rounded-lg transition">
                            Cancel
                        </a>

                        <button type="submit"
                            class="flex-1 bg-[#D9A85B] hover:bg-[#B58A4A] text-[#171717] font-bold px-6 py-3 rounded-lg transition">
                            Confirm Simulated Payment
                        </button>

                    </div>

                    <p class="text-xs text-gray-500 text-center mt-6">
                        This is a simulated payment system for MHILLIANA GRAND HOTEL.
                        No actual money will be transferred.
                    </p>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
