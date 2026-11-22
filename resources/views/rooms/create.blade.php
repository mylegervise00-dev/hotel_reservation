<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl font-semibold text-[#D9A85B]">
            Add New Room
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-10 px-4">
        <div class="max-w-3xl mx-auto">

            <!-- Page Heading -->
            <div class="mb-8">
                <p class="text-xs tracking-[0.35em] text-[#D9A85B] uppercase">
                    MHILLIANA GRAND HOTEL
                </p>

                <h1 class="font-serif text-4xl text-[#F5F2EC] mt-2">
                    Create a Room
                </h1>

                <p class="text-gray-400 mt-2">
                    Add a new room to your hotel's room inventory.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-[#252525] border border-[#494034] rounded-2xl shadow-xl overflow-hidden">

                <div class="p-6 sm:p-8">

                    <div class="mb-7">
                        <h3 class="font-serif text-2xl text-[#F5F2EC]">
                            Room Information
                        </h3>

                        <p class="text-sm text-gray-400 mt-1">
                            Complete the details below to register a hotel room.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf

                        <!-- Room Number -->
                        <div class="mb-6">
                            <label for="room_number"
                                class="block text-sm font-medium text-[#F5F2EC] mb-2">
                                Room Number
                            </label>

                            <input
                                id="room_number"
                                name="room_number"
                                type="text"
                                value="{{ old('room_number') }}"
                                placeholder="e.g. 101"
                                required
                                class="w-full rounded-lg border border-gray-600 bg-[#1B1B1B] text-[#F5F2EC] placeholder-gray-500 focus:border-[#D9A85B] focus:ring-[#D9A85B] px-4 py-3"
                            >

                            @error('room_number')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Room Type -->
                        <div class="mb-6">
                            <label for="room_type"
                                class="block text-sm font-medium text-[#F5F2EC] mb-2">
                                Room Type
                            </label>

                            <select
                                id="room_type"
                                name="room_type"
                                required
                                class="w-full rounded-lg border border-gray-600 bg-[#1B1B1B] text-[#F5F2EC] focus:border-[#D9A85B] focus:ring-[#D9A85B] px-4 py-3"
                            >
                                <option value="">Select Room Type</option>
                                <option value="Single" {{ old('room_type') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Double" {{ old('room_type') == 'Double' ? 'selected' : '' }}>Double</option>
                                <option value="Deluxe" {{ old('room_type') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option value="Suite" {{ old('room_type') == 'Suite' ? 'selected' : '' }}>Suite</option>
                            </select>

                            @error('room_type')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price Per Night -->
                        <div class="mb-6">
                            <label for="price_per_night"
                                class="block text-sm font-medium text-[#F5F2EC] mb-2">
                                Price per Night (₱)
                            </label>

                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#D9A85B] font-semibold">
                                    ₱
                                </span>

                                <input
                                    id="price_per_night"
                                    name="price_per_night"
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    value="{{ old('price_per_night') }}"
                                    placeholder="0.00"
                                    required
                                    class="w-full rounded-lg border border-gray-600 bg-[#1B1B1B] text-[#F5F2EC] placeholder-gray-500 focus:border-[#D9A85B] focus:ring-[#D9A85B] pl-10 pr-4 py-3"
                                >
                            </div>

                            @error('price_per_night')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Room Status -->
                        <div class="mb-8">
                            <label for="status"
                                class="block text-sm font-medium text-[#F5F2EC] mb-2">
                                Room Status
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                class="w-full rounded-lg border border-gray-600 bg-[#1B1B1B] text-[#F5F2EC] focus:border-[#D9A85B] focus:ring-[#D9A85B] px-4 py-3"
                            >
                                <option value="available" {{ old('status', 'available') == 'available' ? 'selected' : '' }}>
                                    Available
                                </option>

                                <option value="occupied" {{ old('status') == 'occupied' ? 'selected' : '' }}>
                                    Occupied
                                </option>

                                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>
                                    Under Maintenance
                                </option>
                            </select>

                            @error('status')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col-reverse sm:flex-row items-center gap-3 pt-6 border-t border-[#494034]">

                            <a href="{{ route('rooms.index') }}"
                                class="w-full sm:w-auto text-center border border-gray-500 text-gray-300 hover:bg-[#333333] px-6 py-3 rounded-lg transition">
                                Cancel
                            </a>

                            <button type="submit"
                                class="w-full sm:w-auto bg-[#D9A85B] hover:bg-[#B58A4A] text-[#171717] font-bold px-7 py-3 rounded-lg transition">
                                Save Room
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
