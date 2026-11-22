<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'check_in',
        'check_out',
        'status',
        'total_amount',
    ];

    // A reservation belongs to one user.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // A reservation belongs to one room.
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    // A reservation can have many payments.
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    // A reservation can include many services.
    public function services(): BelongsToMany
{
    return $this->belongsToMany(Service::class, 'reservation_services')
        ->withPivot('quantity', 'price')
        ->withTimestamps();
}
}
