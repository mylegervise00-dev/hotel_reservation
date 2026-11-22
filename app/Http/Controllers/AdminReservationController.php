<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminReservationController extends Controller
{
    // Display all guest reservations.
    public function index(): View
    {
        $reservations = Reservation::with(['user', 'room', 'services'])
            ->latest()
            ->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    // Update a reservation's status.
    public function updateStatus(Request $request, Reservation $reservation): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:confirmed,cancelled'],
        ]);

        if ($reservation->status !== 'pending') {
            return back()->with('error', 'Only pending reservations can be updated.');
        }

        $reservation->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Reservation status updated successfully!');
    }
}
