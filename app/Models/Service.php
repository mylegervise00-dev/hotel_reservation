<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    // A service can belong to many reservations.
    public function reservations(): BelongsToMany
{
    return $this->belongsToMany(Reservation::class, 'reservation_services')
        ->withPivot('quantity', 'price')
        ->withTimestamps();
}
}
