<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuestProfile extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'date_of_birth',
    ];

    // A guest profile belongs to one user.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
