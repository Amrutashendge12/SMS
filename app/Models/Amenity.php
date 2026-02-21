<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'charges',
        'status'
    ];

    public function bookings()
{
    return $this->hasMany(AmenityBooking::class);
}

}
