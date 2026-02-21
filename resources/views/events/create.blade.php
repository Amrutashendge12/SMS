@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Event</h3>

    <form method="POST"
      action="{{ auth()->user()->role === 'admin'
            ? route('admin.events.store')
            : route('owner.events.store') }}"
      enctype="multipart/form-data">
    @csrf


        <div class="mb-2">
            <label>Event Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Date</label>
                <input type="date" name="event_date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-2">
                <label>Time</label>
                <input type="time" name="event_time" class="form-control" required>
            </div>
        </div>

        <div class="mb-2">
            <label>Venue</label>
            <input type="text" name="venue" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ auth()->user()->role === 'admin'
        ? route('admin.events.index')
        : route('owner.events.index') }}"
   class="btn btn-secondary">
   Back
</a>

    </form>
</div>
@endsection
