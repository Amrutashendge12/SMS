@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Amenity Booking Requests</h3>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Owner</th>
                <th>Amenity</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($bookings as $b)
        <tr>
            <td>{{ $b->user->name }}</td>
            <td>{{ $b->amenity->name }}</td>
            <td>{{ $b->booking_date }}</td>
            <td>
                @if($b->status == 'Pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($b->status == 'Approved')
                    <span class="badge bg-success">Approved</span>
                @else
                    <span class="badge bg-danger">Rejected</span>
                @endif
            </td>

            <td>
                @if($b->status == 'Pending')
                    <a href="{{ route('admin.amenities.approve',$b->id) }}"
                       class="btn btn-success btn-sm">Approve</a>

                    <a href="{{ route('admin.amenities.reject',$b->id) }}"
                       class="btn btn-danger btn-sm">Reject</a>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
