<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoomController extends Controller
{
    // Display all rooms
    public function index(): View
    {
        $rooms = Room::latest()->get();

        return view('rooms.index', compact('rooms'));
    }

    // Show the form for adding a room
    public function create(): View
    {
        return view('rooms.create');
    }

    // Save a new room
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:255', 'unique:rooms,room_number'],
            'room_type' => ['required', 'string', 'max:255'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:available,occupied,maintenance'],
        ]);

        Room::create($validated);

        return redirect()->route('rooms.index')
            ->with('success', 'Room added successfully!');
    }

    // Display one room
    public function show(Room $room): View
    {
        return view('rooms.show', compact('room'));
    }

    // Show the form for editing a room
    public function edit(Room $room): View
    {
        return view('rooms.edit', compact('room'));
    }

    // Update an existing room
    public function update(Request $request, Room $room): RedirectResponse
    {
        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:255', 'unique:rooms,room_number,' . $room->id],
            'room_type' => ['required', 'string', 'max:255'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:available,occupied,maintenance'],
        ]);

        $room->update($validated);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully!');
    }

    // Delete a room
    public function destroy(Room $room): RedirectResponse
    {
        if ($room->reservations()->exists()) {
            return redirect()->route('rooms.index')
                ->with('error', 'This room cannot be deleted because it has reservation records.');
        }

        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully!');
    }
}
