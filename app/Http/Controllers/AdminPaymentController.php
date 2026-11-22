<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\View\View;

class AdminPaymentController extends Controller
{
    // Display all payment records for the Admin.
    public function index(): View
    {
        $payments = Payment::with([
            'reservation.user',
            'reservation.room'
        ])
            ->latest()
            ->get();

        return view('admin.payments.index', compact('payments'));
    }
}
