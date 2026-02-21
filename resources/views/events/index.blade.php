@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Events</h3>

    {{-- Add Event (Admin & Owner only) --}}
    @if(in_array(auth()->user()->role, ['admin','owner']))
        <a href="{{ auth()->user()->role === 'admin'
            ? route('admin.events.create')
            : route('owner.events.create') }}"
           class="btn btn-primary mb-3">
            ➕ Add Event
        </a>
    @endif

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Venue</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($events as $event)
            <tr>
                <td>
                    @if($event->photo)
                        <img src="{{ asset('storage/'.$event->photo) }}" width="60">
                    @else
                        —
                    @endif
                </td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->event_time }}</td>
                <td>{{ $event->venue }}</td>
                <td>
                    {{-- View (All roles) --}}
                    <a href="{{ auth()->user()->role === 'admin'
                        ? route('admin.events.show',$event->id)
                        : (auth()->user()->role === 'owner'
                            ? route('owner.events.show',$event->id)
                            : route('security.events.show',$event->id)) }}"
                       class="btn btn-sm btn-info">
                        View
                    </a>

                    {{-- Edit & Delete (Admin & Owner only) --}}
                    @if(in_array(auth()->user()->role, ['admin','owner']))
                        <a href="{{ auth()->user()->role === 'admin'
                            ? route('admin.events.edit',$event->id)
                            : route('owner.events.edit',$event->id) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ auth()->user()->role === 'admin'
                                ? route('admin.events.destroy',$event->id)
                                : route('owner.events.destroy',$event->id) }}"
                              method="POST"
                              class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger delete-btn">
                                Delete
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No events found</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '{{ session('success') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function () {
        const form = this.closest('.delete-form');

        Swal.fire({
            title: 'Are you sure?',
            text: "This event will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection
