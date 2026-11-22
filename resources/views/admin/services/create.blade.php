<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D9A85B]">
                MHILLIANA GRAND HOTEL
            </p>
            <h2 class="mt-1 font-serif text-2xl text-[#F5F2EC]">
                Add New Service
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-12">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <!-- Form Card -->
            <div class="overflow-hidden rounded-xl border border-[#383838] bg-[#252525] shadow-xl">

                <!-- Card Header -->
                <div class="border-b border-[#383838] px-6 py-6 sm:px-8">

                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#D9A85B]">
                        Hotel Operations
                    </p>

                    <h1 class="mt-2 font-serif text-3xl text-[#F5F2EC]">
                        Create Hotel Service
                    </h1>

                    <p class="mt-2 text-sm leading-relaxed text-gray-400">
                        Add an additional service that guests can enjoy during their stay.
                    </p>

                </div>

                <!-- Form Body -->
                <div class="p-6 sm:p-8">

                    <form method="POST" action="{{ route('services.store') }}" class="space-y-6">
                        @csrf

                        <!-- Service Name -->
                        <div>
                            <label for="name" class="mb-2 block text-sm font-medium text-gray-300">
                                Service Name <span class="text-[#D9A85B]">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                class="w-full rounded-lg border border-[#454545] bg-[#171717] px-4 py-3 text-[#F5F2EC] placeholder-gray-500 shadow-sm transition focus:border-[#D9A85B] focus:outline-none focus:ring-1 focus:ring-[#D9A85B]"
                                placeholder="Example: Breakfast"
                            >

                            @error('name')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="mb-2 block text-sm font-medium text-gray-300">
                                Service Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                class="w-full rounded-lg border border-[#454545] bg-[#171717] px-4 py-3 text-[#F5F2EC] placeholder-gray-500 shadow-sm transition focus:border-[#D9A85B] focus:outline-none focus:ring-1 focus:ring-[#D9A85B]"
                                placeholder="Describe the service and what guests can expect..."
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="mb-2 block text-sm font-medium text-gray-300">
                                Service Price <span class="text-[#D9A85B]">*</span>
                            </label>

                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#D9A85B]">
                                    ₱
                                </span>

                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    value="{{ old('price') }}"
                                    min="0"
                                    step="0.01"
                                    required
                                    class="w-full rounded-lg border border-[#454545] bg-[#171717] py-3 pl-10 pr-4 text-[#F5F2EC] placeholder-gray-500 shadow-sm transition focus:border-[#D9A85B] focus:outline-none focus:ring-1 focus:ring-[#D9A85B]"
                                    placeholder="250.00"
                                >
                            </div>

                            @error('price')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs text-gray-500">
                                Enter the amount guests will pay for this service.
                            </p>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="mb-2 block text-sm font-medium text-gray-300">
                                Service Availability <span class="text-[#D9A85B]">*</span>
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                class="w-full rounded-lg border border-[#454545] bg-[#171717] px-4 py-3 text-[#F5F2EC] shadow-sm transition focus:border-[#D9A85B] focus:outline-none focus:ring-1 focus:ring-[#D9A85B]"
                            >
                                <option value="available" {{ old('status', 'available') === 'available' ? 'selected' : '' }}>
                                    Available
                                </option>

                                <option value="unavailable" {{ old('status') === 'unavailable' ? 'selected' : '' }}>
                                    Unavailable
                                </option>
                            </select>

                            @error('status')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col-reverse gap-4 border-t border-[#383838] pt-6 sm:flex-row sm:items-center sm:justify-between">

                            <a href="{{ route('services.index') }}"
                                class="text-center text-sm font-medium text-gray-400 transition hover:text-[#D9A85B] sm:text-left">
                                ← Back to Services
                            </a>

                            <button
                                type="submit"
                                class="rounded-lg border border-[#D9A85B] bg-[#D9A85B] px-7 py-3 text-sm font-semibold text-[#171717] transition hover:bg-[#B58A4A]"
                            >
                                Save Service
                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- Footer Note -->
            <p class="mt-6 text-center text-xs tracking-wide text-gray-500">
                MHILLIANA GRAND HOTEL · SERVICE MANAGEMENT
            </p>

        </div>
    </div>

</x-app-layout>
