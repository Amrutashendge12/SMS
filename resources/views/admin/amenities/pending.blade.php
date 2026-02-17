@extends('layouts.app')

@section('content')

<h3>Pending Amenity Bookings</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>User</th>
            <th>Amenity</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->user->name }}</td>
            <td>{{ $booking->amenity->name }}</td>
            <td>{{ $booking->booking_date }}</td>

            <td>
                <span class="badge bg-warning">Pending</span>
            </td>

            <td>
                <a href="{{ route('admin.bookings.approve',$booking->id) }}" class="btn btn-success btn-sm">Approve</a>

                <a href="{{ route('admin.bookings.reject',$booking->id) }}" class="btn btn-danger btn-sm">Reject</a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
