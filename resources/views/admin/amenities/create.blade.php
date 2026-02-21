@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Amenity</h3>

    <form method="POST" action="{{ route('admin.amenities.store') }}">
        @csrf

        {{-- Amenity Dropdown --}}
        <div class="mb-3">
            <label>Select Amenity</label>
            <select name="name" id="amenitySelect" class="form-select" required>
                <option value="">-- Select Amenity --</option>

                <option value="Gym" data-charge="0">Gym</option>
                <option value="Pool" data-charge="200">Pool</option>
                <option value="Parking" data-charge="500">Parking</option>
                <option value="Meeting Hall" data-charge="1000">Meeting Hall</option>
                <option value="Garden" data-charge="0">Garden</option>
                <option value="Seminar Hall" data-charge="1500">Seminar Hall</option>
                <option value="Visitor Room" data-charge="800">Visitor Room</option>
                <option value="Cricket Ground" data-charge="500">Cricket Ground</option>
                <option value="Club House" data-charge="1200">Club House</option>

            </select>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        {{-- Charges --}}
        <div class="mb-3">
            <label>Charges</label>
            <input type="number" name="charges" id="chargeInput" class="form-control">
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Save</button>
    </form>

</div>

{{-- Auto Charges Script --}}
<script>
document.getElementById('amenitySelect').addEventListener('change', function() {
    let charge = this.options[this.selectedIndex].getAttribute('data-charge');
    document.getElementById('chargeInput').value = charge;
});
</script>

@endsection
