<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class GuestRoomController extends Controller
{
    // Display only available rooms for guests.
    public function index(): View
    {
        $rooms = Room::where('status', 'available')
            ->orderBy('room_type')
            ->get();

        return view('guest.rooms.index', compact('rooms'));
    }
}
