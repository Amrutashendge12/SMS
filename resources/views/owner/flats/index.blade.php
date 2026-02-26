@extends('layouts.app')

@section('content')

<h3>Flats</h3>
<p class="text-muted">Flat details under your ownership</p>

<div class="card shadow">
    <div class="card-body table-responsive">

        <table class="table table-bordered datatable">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Flat Number</th>
                    <th>Floor</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($flats as $flat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $flat->flat_number }}</td>
                        <td>{{ $flat->floor_no }}</td>
                        <td>{{ $flat->flat_type }}</td>
                        <td>
                            <span class="badge 
                                {{ $flat->status === 'available' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($flat->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No flats assigned to you
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
