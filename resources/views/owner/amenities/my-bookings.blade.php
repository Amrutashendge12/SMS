@extends('layouts.app')

@section('content')

<div class="container">
    <h3 class="mb-4">My Amenity Bookings</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Amenity</th>
                <th>Booking Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->amenity->name }}</td>
                <td>{{ $booking->booking_date }}</td>

                <td>
                    @if($booking->status == 'Pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($booking->status == 'Approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No bookings found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
