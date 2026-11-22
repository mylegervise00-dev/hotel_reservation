<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PaymentController extends Controller
{
    // Display the payment form.
    public function create(Request $request, Reservation $reservation): View
    {
        if ((int) $reservation->user_id !== (int) $request->user()->id) {
            abort(403, 'You are not allowed to pay for this reservation.');
        }

        if ($reservation->status !== 'confirmed') {
            abort(403, 'Only confirmed reservations can be paid.');
        }

        if ($reservation->payments()->exists()) {
            abort(403, 'This reservation already has a payment record.');
        }

        return view('guest.payments.create', compact('reservation'));
    }

    // Process the simulated payment.
    public function store(Request $request, Reservation $reservation): RedirectResponse
    {
        // Check that the reservation belongs to the logged-in user.
        if ((int) $reservation->user_id !== (int) $request->user()->id) {
            abort(403, 'You are not allowed to pay for this reservation.');
        }

        // Validate the selected payment method.
        $validated = $request->validate([
            'payment_method' => ['required', 'in:gcash,cash,bank_transfer'],
        ]);

        // Safely create the payment inside a database transaction.
        $paymentCreated = DB::transaction(function () use ($request, $reservation, $validated) {

            // Lock the reservation while processing its payment.
            $lockedReservation = Reservation::whereKey($reservation->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Check reservation ownership again.
            if ((int) $lockedReservation->user_id !== (int) $request->user()->id) {
                abort(403, 'You are not allowed to pay for this reservation.');
            }

            // Only confirmed reservations can be paid.
            if ($lockedReservation->status !== 'confirmed') {
                abort(403, 'Only confirmed reservations can be paid.');
            }

            // Prevent a second payment record.
            if ($lockedReservation->payments()->exists()) {
                return false;
            }

            // Create the simulated payment.
            $lockedReservation->payments()->create([
                'amount' => $lockedReservation->total_amount,
                'payment_method' => $validated['payment_method'],
                'status' => 'paid',
                'transaction_id' => 'SIM-' . strtoupper(Str::random(10)),
            ]);

            return true;
        });

        if (!$paymentCreated) {
            return redirect()->route('guest.reservations.index')
                ->with('error', 'This reservation already has a payment record.');
        }

        return redirect()->route('guest.reservations.index')
            ->with('success', 'Simulated payment recorded successfully!');
    }
}
