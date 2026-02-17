@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Parking Entry</h3>

    {{-- ROLE BASED FORM ACTION --}}
    @if(auth()->user()->role == 'admin')
        <form method="POST" action="{{ route('admin.parkings.store') }}">
    @else
        <form method="POST" action="{{ route('security.parkings.store') }}">
    @endif

        @csrf

        <div class="mb-3">
            <label>Vehicle Number</label>
            <input type="text" name="vehicle_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Owner Name</label>
            <input type="text" name="owner_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Vehicle Type</label>
            <select name="vehicle_type" class="form-control" required>
                <option value="">Select Type</option>
                <option>2 Wheeler</option>
                <option>Cycle</option>
                <option>4 Wheeler</option>
            </select>
        </div>

        <button class="btn btn-success">Park Vehicle</button>

        {{-- ROLE BASED BACK BUTTON --}}
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('admin.parkings.index') }}" class="btn btn-secondary">Back</a>
        @else
            <a href="{{ route('security.parkings.index') }}" class="btn btn-secondary">Back</a>
        @endif

    </form>

</div>
@endsection
