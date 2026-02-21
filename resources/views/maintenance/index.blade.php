@extends('layouts.app')

@section('content')
<div class="container">

<h2>Maintenance List</h2>

{{-- SUMMARY CARDS (TOP) --}}
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Maintenance</h5>
                <h2>{{ $totalMaintenances }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Total Collected</h5>
                <h2>₹{{ $totalCollected }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Pending Amount</h5>
                <h2>₹{{ $totalPending }}</h2>
            </div>
        </div>
    </div>

</div>

{{-- BUTTONS --}}
@if(Auth::user()->role != 'security')
<a href="{{ route('owner.maintenance.create') }}" class="btn btn-primary mb-3">Add Maintenance</a>
@endif

<a href="{{ route('owner.maintenance.graph') }}" class="btn btn-dark mb-3">
    View Collection Graph
</a>

{{-- TABLE --}}
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Society</th>
            <th>Phase</th>
            <th>Wing</th>
            <th>Floor</th>
            <th>Flat</th>
            <th>Owner</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($maintenances as $m)
        <tr>
            <td>{{ $m->society_name }}</td>
            <td>{{ $m->phase_name }}</td>
            <td>{{ $m->wing }}</td>
            <td>{{ $m->floor }}</td>
            <td>{{ $m->flat_no }}</td>
            <td>{{ $m->owner_name }}</td>
            <td>₹{{ $m->amount }}</td>

            <td>
                <span class="badge bg-{{ $m->status == 'paid' ? 'success':'danger' }}">
                    {{ $m->status }}
                </span>
            </td>

            <td>{{ $m->due_date }}</td>

            <td>
                <a href="{{ route('owner.maintenance.show',$m->id) }}" class="btn btn-info btn-sm">View</a>

                @if(Auth::user()->role != 'security')
                <a href="{{ route('owner.maintenance.edit',$m->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('owner.maintenance.destroy',$m->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
