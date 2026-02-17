@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Amenity</h3>

    <form method="POST" action="{{ route('admin.amenities.update',$amenity->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                   value="{{ $amenity->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">
                {{ $amenity->description }}
            </textarea>
        </div>

        <div class="mb-3">
            <label>Charges</label>
            <input type="number" name="charges"
                   value="{{ $amenity->charges }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="1" {{ $amenity->status ? 'selected':'' }}>
                    Active
                </option>
                <option value="0" {{ !$amenity->status ? 'selected':'' }}>
                    Inactive
                </option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
