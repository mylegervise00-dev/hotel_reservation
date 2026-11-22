<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'room_type',
        'price_per_night',
        'status',
    ];

    // One room can have many reservations.
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
