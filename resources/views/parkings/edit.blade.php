@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Parking</h3>

    <form method="POST" action="{{ route('admin.parkings.update',$parking->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Vehicle Number</label>
            <input type="text" name="vehicle_number"
                   value="{{ $parking->vehicle_number }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Owner Name</label>
            <input type="text" name="owner_name"
                   value="{{ $parking->owner_name }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Vehicle Type</label>
            <select name="vehicle_type" class="form-control" required>
                <option {{ $parking->vehicle_type=='2 Wheeler'?'selected':'' }}>2 Wheeler</option>
                <option {{ $parking->vehicle_type=='Cycle'?'selected':'' }}>Cycle</option>
                <option {{ $parking->vehicle_type=='4 Wheeler'?'selected':'' }}>4 Wheeler</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Slot Number</label>
            <input type="text" name="slot_number"
                   value="{{ $parking->slot_number }}"
                   class="form-control" required>
        </div>

        <button class="btn btn-primary">Update Parking</button>
        <a href="{{ route('admin.parkings.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
