@extends('layouts.app')

@section('content')

<h3>Rejected Amenity Bookings</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>User</th>
            <th>Amenity</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->user->name }}</td>
            <td>{{ $booking->amenity->name }}</td>
            <td>{{ $booking->date }}</td>

            <td>
                <span class="badge bg-danger">Rejected</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
