@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3>Add Member</h3>

    <form method="POST" action="{{ route('admin.member.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- Basic Info --}}
            <div class="col-md-4 mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Mobile Number</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>

            {{-- Password --}}
            <div class="col-md-4 mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            {{-- Family Details --}}
            <div class="col-md-4 mb-3">
                <label>Total Family Members</label>
                <input type="number" name="total_family_members" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label>Total Children</label>
                <input type="number" name="total_children" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label>Boys</label>
                <input type="number" name="boys" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label>Girls</label>
                <input type="number" name="girls" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label>Old People</label>
                <input type="number" name="old_people" class="form-control">
            </div>

            {{-- Other --}}
            <div class="col-md-4 mb-3">
                <label>Occupation</label>
                <input type="text" name="occupation" class="form-control">
            </div>

            <div class="col-md-8 mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            {{-- Flat Assign --}}
            <div class="col-md-12 mb-3">
                <label>Select Flat</label>
                <select name="flat_id" class="form-select">
                    <option value="">-- Select Flat --</option>
                    @foreach($flats as $flat)
                        <option value="{{ $flat->id }}">
                            {{ $flat->wing->phase->society->society_name }} →
                            {{ $flat->wing->phase->phase_name }} →
                            {{ $flat->wing->wing_name }} →
                            Flat {{ $flat->flat_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Profile Photo --}}
            <div class="col-md-6 mb-3">
                <label>Profile Photo</label>
                <input type="file" name="profile_photo" class="form-control">
            </div>

        </div>

        <button class="btn btn-success">Save Member</button>
        <a href="{{ route('admin.member.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@endsection
