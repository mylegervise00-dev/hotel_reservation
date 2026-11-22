<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-xs uppercase tracking-[0.3em] text-amber-600">
                MHILLIANA GRAND HOTEL
            </p>
            <h2 class="font-serif text-2xl text-gray-900 dark:text-white">
                Room Details
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-12 px-4">
        <div class="max-w-4xl mx-auto">

            {{-- Page Heading --}}
            <div class="mb-8">
                <p class="text-sm text-gray-400">
                    Room Management / Room Details
                </p>

                <h1 class="mt-2 text-3xl font-serif text-[#F5F2EC]">
                    Room {{ $room->room_number }}
                </h1>

                <p class="mt-2 text-gray-400">
                    View the complete information for this hotel room.
                </p>
            </div>

            {{-- Room Information Card --}}
            <div class="bg-[#252525] border border-gray-700 rounded-xl shadow-xl overflow-hidden">

                {{-- Card Header --}}
                <div class="p-6 sm:p-8 border-b border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                        <div>
                            <p class="text-xs uppercase tracking-widest text-amber-500">
                                Room Information
                            </p>

                            <h2 class="mt-2 text-2xl font-serif text-[#F5F2EC]">
                                {{ $room->room_type }} Room
                            </h2>

                            <p class="mt-1 text-sm text-gray-400">
                                Room Number: {{ $room->room_number }}
                            </p>
                        </div>

                        {{-- Room Status --}}
                        <div>
                            @if ($room->status === 'available')
                                <span class="inline-flex px-4 py-2 rounded-full text-sm font-medium bg-green-900/40 text-green-400 border border-green-700">
                                    Available
                                </span>
                            @elseif ($room->status === 'occupied')
                                <span class="inline-flex px-4 py-2 rounded-full text-sm font-medium bg-red-900/40 text-red-400 border border-red-700">
                                    Occupied
                                </span>
                            @elseif ($room->status === 'maintenance')
                                <span class="inline-flex px-4 py-2 rounded-full text-sm font-medium bg-yellow-900/40 text-yellow-400 border border-yellow-700">
                                    Maintenance
                                </span>
                            @else
                                <span class="inline-flex px-4 py-2 rounded-full text-sm font-medium bg-gray-700 text-gray-300">
                                    {{ ucfirst($room->status) }}
                                </span>
                            @endif
                        </div>

                    </div>
                </div>

                {{-- Details --}}
                <div class="p-6 sm:p-8">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        {{-- Room Number --}}
                        <div class="bg-[#1B1B1B] rounded-lg p-5 border border-gray-700">
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Room Number
                            </p>

                            <p class="mt-2 text-xl font-semibold text-[#F5F2EC]">
                                {{ $room->room_number }}
                            </p>
                        </div>

                        {{-- Room Type --}}
                        <div class="bg-[#1B1B1B] rounded-lg p-5 border border-gray-700">
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Room Type
                            </p>

                            <p class="mt-2 text-xl font-semibold text-[#F5F2EC]">
                                {{ $room->room_type }}
                            </p>
                        </div>

                        {{-- Price --}}
                        <div class="bg-[#1B1B1B] rounded-lg p-5 border border-gray-700">
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Price Per Night
                            </p>

                            <p class="mt-2 text-2xl font-semibold text-amber-500">
                                ₱{{ number_format($room->price_per_night, 2) }}
                            </p>
                        </div>

                        {{-- Date Added --}}
                        <div class="bg-[#1B1B1B] rounded-lg p-5 border border-gray-700">
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Date Added
                            </p>

                            <p class="mt-2 text-xl font-semibold text-[#F5F2EC]">
                                {{ $room->created_at->format('F d, Y') }}
                            </p>
                        </div>

                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-col sm:flex-row items-center gap-3 mt-8 pt-6 border-t border-gray-700">

                        <a href="{{ route('rooms.edit', $room) }}"
                           class="w-full sm:w-auto text-center px-6 py-3 bg-[#D9A85B] text-[#171717] font-semibold rounded-lg hover:bg-[#B58A4A] transition">
                            Edit Room
                        </a>

                        <a href="{{ route('rooms.index') }}"
                           class="w-full sm:w-auto text-center px-6 py-3 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition">
                            Back to Rooms
                        </a>

                    </div>

                </div>
            </div>

            <p class="text-center text-xs text-gray-600 mt-8">
                MHILLIANA GRAND HOTEL · ROOM MANAGEMENT
            </p>

        </div>
    </div>
</x-app-layout>
