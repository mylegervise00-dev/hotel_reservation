<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl font-semibold text-[#D9A85B]">
            Payment Management
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#171717] py-10 px-4">
        <div class="max-w-7xl mx-auto">

            <!-- Page Heading -->
            <div class="mb-8">
                <p class="text-xs tracking-[0.35em] text-[#D9A85B] uppercase">
                    MHILLIANA GRAND HOTEL
                </p>

                <h1 class="font-serif text-4xl text-[#F5F2EC] mt-2">
                    Payment Records
                </h1>

                <p class="text-gray-400 mt-2">
                    Monitor and review payments submitted by hotel guests.
                </p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg border border-green-700 bg-green-900/30 text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Payment Table Container -->
            <div class="bg-[#252525] border border-[#494034] rounded-2xl shadow-xl overflow-hidden">

                <div class="p-6 sm:p-8">
                    <h3 class="font-serif text-2xl text-[#F5F2EC]">
                        All Payment Records
                    </h3>

                    <p class="text-gray-400 text-sm mt-2">
                        View payment transactions and their current status.
                    </p>
                </div>

                <div class="border-t border-[#494034]"></div>

                @if ($payments->isEmpty())

                    <!-- Empty State -->
                    <div class="text-center py-16 px-6">
                        <div class="text-5xl mb-4 text-[#D9A85B]">
                            ₱
                        </div>

                        <h3 class="font-serif text-2xl text-[#F5F2EC]">
                            No Payment Records Yet
                        </h3>

                        <p class="text-gray-400 mt-3 max-w-md mx-auto">
                            Payment records will appear here after guests complete their payments.
                        </p>
                    </div>

                @else

                    <!-- Responsive Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">

                            <thead class="bg-[#1B1B1B] text-[#D9A85B] uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="px-5 py-4 whitespace-nowrap">Payment ID</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Guest</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Reservation</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Room</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Amount</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Method</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Status</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Transaction Reference</th>
                                    <th class="px-5 py-4 whitespace-nowrap">Payment Date</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-700">

                                @foreach ($payments as $payment)
                                    <tr class="hover:bg-[#303030] transition">

                                        <td class="px-5 py-4 text-gray-300 whitespace-nowrap">
                                            #{{ $payment->id }}
                                        </td>

                                        <td class="px-5 py-4 text-[#F5F2EC] font-medium whitespace-nowrap">
                                            {{ $payment->reservation->user->name }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-300 whitespace-nowrap">
                                            #{{ $payment->reservation->id }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-300 whitespace-nowrap">
                                            {{ $payment->reservation->room->room_number }}
                                        </td>

                                        <td class="px-5 py-4 text-[#D9A85B] font-semibold whitespace-nowrap">
                                            ₱{{ number_format($payment->amount, 2) }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-300 whitespace-nowrap">
                                            @if ($payment->payment_method === 'gcash')
                                                GCash (Simulated)
                                            @elseif ($payment->payment_method === 'cash')
                                                Cash at Hotel
                                            @elseif ($payment->payment_method === 'bank_transfer')
                                                Bank Transfer (Simulated)
                                            @else
                                                {{ ucfirst($payment->payment_method) }}
                                            @endif
                                        </td>

                                        <td class="px-5 py-4 whitespace-nowrap">
                                            @if ($payment->status === 'paid')
                                                <span class="px-3 py-1 rounded-full bg-green-900/40 text-green-300 text-xs font-semibold">
                                                    Paid
                                                </span>
                                            @elseif ($payment->status === 'pending')
                                                <span class="px-3 py-1 rounded-full bg-yellow-900/40 text-yellow-300 text-xs font-semibold">
                                                    Pending
                                                </span>
                                            @else
                                                <span class="px-3 py-1 rounded-full bg-red-900/40 text-red-300 text-xs font-semibold">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            @endif
                                        </td>

                                        <td class="px-5 py-4 text-gray-400 text-xs whitespace-nowrap">
                                            {{ $payment->transaction_id ?? 'N/A' }}
                                        </td>

                                        <td class="px-5 py-4 text-gray-400 whitespace-nowrap">
                                            {{ $payment->created_at->format('M d, Y h:i A') }}
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                @endif

                <div class="border-t border-[#494034]"></div>

                <div class="px-6 py-4">
                    <a href="{{ route('dashboard') }}"
                        class="text-sm text-[#D9A85B] hover:text-[#F5F2EC] transition">
                        ← Back to Dashboard
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
