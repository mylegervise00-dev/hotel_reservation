<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'reservation_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
    ];

    // A payment belongs to one reservation.
    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
