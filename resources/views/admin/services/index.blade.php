<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D9A85B]">
                MHILLIANA GRAND HOTEL
            </p>
            <h2 class="mt-1 font-serif text-2xl text-[#F5F2EC]">
                Service Management
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-10">
        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

            <!-- Page Heading -->
            <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">

                <div>
                    <p class="text-sm uppercase tracking-[0.2em] text-[#D9A85B]">
                        Hotel Operations
                    </p>

                    <h1 class="mt-2 font-serif text-3xl text-[#F5F2EC] sm:text-4xl">
                        Hotel Services
                    </h1>

                    <p class="mt-2 text-sm text-gray-400">
                        Manage additional services offered to your hotel guests.
                    </p>
                </div>

                <a href="{{ route('services.create') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-[#D9A85B] bg-[#D9A85B] px-6 py-3 text-sm font-semibold text-[#171717] transition hover:bg-[#B58A4A]">

                    <span class="mr-2 text-lg">+</span>
                    Add New Service
                </a>

            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="rounded-lg border border-green-500/30 bg-green-500/10 p-4 text-sm text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="rounded-lg border border-red-500/30 bg-red-500/10 p-4 text-sm text-red-400">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Services Table -->
            <div class="overflow-hidden rounded-xl border border-[#383838] bg-[#252525] shadow-xl">

                <div class="border-b border-[#383838] px-6 py-5">
                    <h3 class="font-serif text-xl text-[#F5F2EC]">
                        Available Hotel Services
                    </h3>

                    <p class="mt-1 text-sm text-gray-400">
                        View and manage your hotel's additional services.
                    </p>
                </div>

                @if ($services->isEmpty())

                    <!-- Empty State -->
                    <div class="px-6 py-16 text-center">

                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full border border-[#D9A85B]/30 bg-[#D9A85B]/10">
                            <span class="text-3xl text-[#D9A85B]">✦</span>
                        </div>

                        <h3 class="mt-5 font-serif text-2xl text-[#F5F2EC]">
                            No Services Found
                        </h3>

                        <p class="mt-2 text-sm text-gray-400">
                            Add your first hotel service to get started.
                        </p>

                        <a href="{{ route('services.create') }}"
                            class="mt-6 inline-block rounded-lg bg-[#D9A85B] px-5 py-3 text-sm font-semibold text-[#171717] transition hover:bg-[#B58A4A]">
                            + Add Your First Service
                        </a>

                    </div>

                @else

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-[#383838]">

                            <thead class="bg-[#1D1D1D]">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#D9A85B]">
                                        Service
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#D9A85B]">
                                        Description
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#D9A85B]">
                                        Price
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#D9A85B]">
                                        Status
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-[#D9A85B]">
                                        Actions
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-[#383838]">

                                @foreach ($services as $service)

                                    <tr class="transition hover:bg-[#303030]">

                                        <!-- Service Name -->
                                        <td class="whitespace-nowrap px-6 py-5">
                                            <span class="font-semibold text-[#F5F2EC]">
                                                {{ $service->name }}
                                            </span>
                                        </td>

                                        <!-- Description -->
                                        <td class="max-w-xs px-6 py-5 text-sm text-gray-400">
                                            {{ $service->description ?: 'No description' }}
                                        </td>

                                        <!-- Price -->
                                        <td class="whitespace-nowrap px-6 py-5">
                                            <span class="font-semibold text-[#D9A85B]">
                                                ₱{{ number_format($service->price, 2) }}
                                            </span>
                                        </td>

                                        <!-- Status -->
                                        <td class="whitespace-nowrap px-6 py-5">

                                            @if ($service->status === 'available')
                                                <span class="inline-flex rounded-full border border-green-500/30 bg-green-500/10 px-3 py-1 text-xs font-semibold text-green-400">
                                                    Available
                                                </span>
                                            @else
                                                <span class="inline-flex rounded-full border border-red-500/30 bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400">
                                                    Unavailable
                                                </span>
                                            @endif

                                        </td>

                                        <!-- Actions -->
                                        <td class="whitespace-nowrap px-6 py-5">

                                            <div class="flex items-center gap-4">

                                                <a href="{{ route('services.edit', $service) }}"
                                                    class="text-sm font-semibold text-[#D9A85B] transition hover:text-[#F5F2EC]">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('services.destroy', $service) }}"
                                                    onsubmit="return confirm('Are you sure you want to delete this service?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="text-sm font-semibold text-red-400 transition hover:text-red-300">
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif

            </div>

            <!-- Back to Dashboard -->
            <div>
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-400 transition hover:text-[#D9A85B]">
                    <span>←</span>
                    Back to Dashboard
                </a>
            </div>

        </div>
    </div>

</x-app-layout>
