@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Event Details</h3>

    <div class="card shadow">
        <div class="card-body">

            {{-- Photo --}}
            @if($event->photo)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$event->photo) }}"
                         class="img-fluid rounded"
                         style="max-width:300px;">
                </div>
            @endif

            <p><strong>Name:</strong> {{ $event->name }}</p>
            <p><strong>Date:</strong> {{ $event->event_date }}</p>
            <p><strong>Time:</strong> {{ $event->event_time }}</p>
            <p><strong>Venue:</strong> {{ $event->venue }}</p>
            <p><strong>Location:</strong> {{ $event->location }}</p>

            @if($event->description)
                <p><strong>Description:</strong><br>
                    {{ $event->description }}
                </p>
            @endif

            <div class="mt-3">
                {{-- Back button (all roles) --}}
                <a href="{{ auth()->user()->role === 'admin'
                    ? route('admin.events.index')
                    : (auth()->user()->role === 'owner'
                        ? route('owner.events.index')
                        : route('security.events.index')) }}"
                   class="btn btn-secondary">
                    Back
                </a>

                {{-- Edit button (Admin & Owner only) --}}
                @if(in_array(auth()->user()->role, ['admin','owner']))
                    <a href="{{ auth()->user()->role === 'admin'
                        ? route('admin.events.edit', $event->id)
                        : route('owner.events.edit', $event->id) }}"
                       class="btn btn-warning">
                        Edit
                    </a>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
