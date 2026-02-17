@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Book {{ $amenity->name }}</h3>

    <form method="POST" action="{{ route('owner.amenities.store') }}">
        @csrf

        <input type="hidden" name="amenity_id" value="{{ $amenity->id }}">

        <div class="mb-3">
            <label>Booking Date</label>
            <input type="date" name="booking_date" class="form-control" required>
        </div>

        <button class="btn btn-success">Confirm Booking</button>
    </form>

</div>
@endsection
