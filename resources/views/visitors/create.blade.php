@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3>Add Visitor Entry</h3>

    <form method="POST" action="{{ route('security.visitors.store') }}">
        @csrf

        <div class="row">

            <div class="col-md-4 mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Purpose</label>
                <select name="purpose" class="form-select">
                    <option value="Guest">Guest</option>
                    <option value="Delivery">Delivery</option>
                    <option value="Service">Service</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label>Select Flat</label>

                <select name="flat_id" class="form-select" required>
                    <option value="">-- Select Flat --</option>

                    @foreach($flats as $flat)
                        <option value="{{ $flat->id }}">
                            {{ $flat->wing->phase->society->society_name ?? '' }} →
                            {{ $flat->wing->phase->phase_name ?? '' }} →
                            {{ $flat->wing->wing_name ?? '' }} →
                            Flat {{ $flat->flat_number }}
                        </option>
                    @endforeach

                </select>
            </div>

        </div>

        <button class="btn btn-success">Save Entry</button>
        <a href="{{ route('security.visitors.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection
