<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AmenityBooking;

class AmenityBookingController extends Controller
{
    // Show Pending bookings (default page)
    public function index()
    {
        $bookings = AmenityBooking::with(['amenity','user'])
            ->where('status','Pending')
            ->latest()
            ->get();

        return view('admin.amenities.pending', compact('bookings'));
    }

    // Show Pending bookings
    public function pending()
    {
        $bookings = AmenityBooking::with(['amenity','user'])
            ->where('status','Pending')
            ->latest()
            ->get();

        return view('admin.amenities.pending', compact('bookings'));
    }

    // Show Approved bookings
    public function approved()
    {
        $bookings = AmenityBooking::with(['amenity','user'])
            ->where('status','Approved')
            ->latest()
            ->get();

        return view('admin.amenities.approved', compact('bookings'));
    }

    // Show Rejected bookings
    public function rejected()
    {
        $bookings = AmenityBooking::with(['amenity','user'])
            ->where('status','Rejected')
            ->latest()
            ->get();

        return view('admin.amenities.rejected', compact('bookings'));
    }

    // Approve booking
    public function approve($id)
    {
        $booking = AmenityBooking::findOrFail($id);
        $booking->status = 'Approved';
        $booking->save();

        return back()->with('success','Booking Approved!');
    }

    // Reject booking
    public function reject($id)
    {
        $booking = AmenityBooking::findOrFail($id);
        $booking->status = 'Rejected';
        $booking->save();

        return back()->with('success','Booking Rejected!');
    }
}
