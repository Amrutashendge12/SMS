<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmenityBooking extends Model
{
    protected $fillable = [
        'user_id',
        'amenity_id',
        'booking_date',
        'status'
    ];

    public function amenity()
    {
        return $this->belongsTo(Amenity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
