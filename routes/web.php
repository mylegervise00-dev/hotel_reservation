<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestRoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminPaymentController;
use App\Models\User;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $rooms = \App\Models\Room::where('status', 'available')
        ->orderBy('room_type')
        ->take(3)
        ->get();

    return view('welcome', compact('rooms'));
});

Route::get('/dashboard', function () {

    /** @var User $user */
    $user = Auth::user();

    if ($user->isAdmin()) {

        $totalRooms = Room::count();

        $availableRooms = Room::where('status', 'available')->count();

        $occupiedRooms = Room::where('status', 'occupied')->count();

        $pendingReservations = Reservation::where('status', 'pending')->count();

        $totalReservations = Reservation::count();

        $recentReservations = Reservation::with(['user', 'room'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRooms',
            'availableRooms',
            'occupiedRooms',
            'pendingReservations',
            'totalReservations',
            'recentReservations'
        ));
    }

    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');



// Routes available to all logged-in users.
Route::middleware('auth')->group(function () {

    // Guest Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Guest Room Browsing route
    Route::get('/available-rooms', [GuestRoomController::class, 'index'])
          ->name('guest.rooms.index');

    // Reservation routes
    Route::get('/rooms/{room}/book', [ReservationController::class, 'create'])
        ->name('guest.reservations.create');
    
    Route::post('/rooms/{room}/book', [ReservationController::class, 'store'])
        ->name('guest.reservations.store');
    
    Route::get('/my-reservations', [ReservationController::class, 'index'])
        ->name('guest.reservations.index');
    
    Route::patch('/my-reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])
        ->name('guest.reservations.cancel');
        
            // Guest Payment routes
    Route::get('/my-reservations/{reservation}/pay', [PaymentController::class, 'create'])
        ->name('guest.payments.create');
    
    Route::post('/my-reservations/{reservation}/pay', [PaymentController::class, 'store'])
        ->name('guest.payments.store');

});

// Admin-only routes.
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('rooms', RoomController::class);

    // Admin Reservation Management
    Route::get('/admin/reservations', [AdminReservationController::class, 'index'])
        ->name('admin.reservations.index');

    Route::patch('/admin/reservations/{reservation}/status', [AdminReservationController::class, 'updateStatus'])
        ->name('admin.reservations.updateStatus');

    // Admin Service Management
    Route::resource('services', ServiceController::class);

    // Admin Payment Management
Route::get('/admin/payments', [AdminPaymentController::class, 'index'])
    ->name('admin.payments.index');
});

require __DIR__.'/auth.php';
