<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ReservationController extends Controller
{
    // Display the booking form.
    public function create(Room $room): View
    {
        if ($room->status !== 'available') {
            abort(404);
        }

        $services = Service::where('status', 'available')
            ->orderBy('name')
            ->get();

        return view('guest.reservations.create', compact('room', 'services'));
    }

    // Save a new reservation.
    public function store(Request $request, Room $room): RedirectResponse
    {
        $validated = $request->validate([
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'services' => ['nullable', 'array'],
            'services.*' => ['integer', 'distinct', 'exists:services,id'],
        ]);

        DB::transaction(function () use ($request, $room, $validated) {

            // Lock the room while checking availability.
            $lockedRoom = Room::whereKey($room->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($lockedRoom->status !== 'available') {
                throw ValidationException::withMessages([
                    'room' => 'This room is currently unavailable.',
                ]);
            }

            // Check for overlapping reservations.
            $hasConflict = $lockedRoom->reservations()
                ->whereIn('status', ['pending', 'confirmed'])
                ->where('check_in', '<', $validated['check_out'])
                ->where('check_out', '>', $validated['check_in'])
                ->exists();

            if ($hasConflict) {
                throw ValidationException::withMessages([
                    'check_in' => 'This room is already reserved for the selected dates.',
                ]);
            }

            // Get selected services that are still available.
            $selectedServices = collect();

            if (!empty($validated['services'])) {
                $selectedServices = Service::whereIn(
                    'id',
                    $validated['services']
                )
                    ->where('status', 'available')
                    ->get();

                if ($selectedServices->count() !== count($validated['services'])) {
                    throw ValidationException::withMessages([
                        'services' => 'One or more selected services are unavailable.',
                    ]);
                }
            }

            // Calculate the number of nights.
            $checkIn = Carbon::parse($validated['check_in']);
            $checkOut = Carbon::parse($validated['check_out']);

            $nights = $checkIn->diffInDays($checkOut);

            // Calculate room and service costs.
            $roomTotal = $nights * $lockedRoom->price_per_night;
            $serviceTotal = $selectedServices->sum('price');
            $totalAmount = $roomTotal + $serviceTotal;

            // Create the reservation.
            $reservation = $request->user()->reservations()->create([
                'room_id' => $lockedRoom->id,
                'check_in' => $validated['check_in'],
                'check_out' => $validated['check_out'],
                'status' => 'pending',
                'total_amount' => $totalAmount,
            ]);

            // Attach selected services to the reservation.
            foreach ($selectedServices as $service) {
                $reservation->services()->attach($service->id, [
                    'quantity' => 1,
                    'price' => $service->price,
                ]);
            }
        });

        return redirect()->route('guest.reservations.index')
            ->with('success', 'Your reservation has been submitted successfully!');
    }

    // Display the logged-in user's reservations.
    public function index(Request $request): View
    {
        $reservations = $request->user()
            ->reservations()
            ->with(['room', 'services', 'payments'])
            ->latest()
            ->get();

        return view('guest.reservations.index', compact('reservations'));
    }

    // Cancel a pending reservation.
    public function cancel(Request $request, Reservation $reservation): RedirectResponse
    {
        // Make sure users can only cancel their own reservations.
        abort_unless(
            (int) $reservation->user_id === (int) $request->user()->id,
            403
        );

        if ($reservation->status !== 'pending') {
            return back()->with('error', 'Only pending reservations can be cancelled.');
        }

        $reservation->update([
            'status' => 'cancelled',
        ]);

        return redirect()->route('guest.reservations.index')
            ->with('success', 'Your reservation has been cancelled.');
    }
}
