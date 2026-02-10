@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Event</h3>

    <form method="POST"
          action="{{ auth()->user()->role === 'admin'
                ? route('admin.events.update', $event->id)
                : route('owner.events.update', $event->id) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Event Name</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <label>Date</label>
                <input type="date" name="event_date" class="form-control"
                       value="{{ old('event_date', $event->event_date) }}" required>
            </div>

            <div class="col-md-6 mb-2">
                <label>Time</label>
                <input type="time" name="event_time" class="form-control"
                       value="{{ old('event_time', $event->event_time) }}" required>
            </div>
        </div>

        <div class="mb-2">
            <label>Venue</label>
            <input type="text" name="venue" class="form-control"
                   value="{{ old('venue', $event->venue) }}" required>
        </div>

        <div class="mb-2">
            <label>Location</label>
            <input type="text" name="location" class="form-control"
                   value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control"
            >{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
            @if($event->photo)
                <img src="{{ asset('storage/'.$event->photo) }}" width="80" class="mt-2">
            @endif
        </div>

        <button class="btn btn-success">Update</button>

        <a href="{{ auth()->user()->role === 'admin'
            ? route('admin.events.index')
            : route('owner.events.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </form>
</div>
@endsection
