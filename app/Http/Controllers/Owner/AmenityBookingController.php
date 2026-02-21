<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\AmenityBooking;

class AmenityBookingController extends Controller
{
    // List amenities
    public function index()
    {
        $amenities = \App\Models\Amenity::all();
        return view('owner.amenities.index', compact('amenities'));
    }

    // Show booking form
    public function create($id)
    {
        $amenity = Amenity::findOrFail($id);
        return view('owner.amenities.book', compact('amenity'));
    }

    // Store booking
    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'required|date'
        ]);

        AmenityBooking::create([
            'user_id' => auth()->id(),
            'amenity_id' => $request->amenity_id,
            'booking_date' => $request->booking_date,
            'status' => 'Pending'
        ]);

        return redirect()->route('owner.amenities.my')
            ->with('success', 'Amenity booked successfully!');
    }

    // Show my bookings
    public function myBookings()
    {
        $bookings = AmenityBooking::with('amenity')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('owner.amenities.my-bookings', compact('bookings'));
    }
}
