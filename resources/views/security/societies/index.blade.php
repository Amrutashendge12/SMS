@extends('layouts.app')

@section('content')

<h3>Societies</h3>
<p class="text-muted">Society details under your ownership</p>

<div class="card shadow">
    <div class="card-body table-responsive">

        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Society Name</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($societies as $society)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $society->society_name }}</td>
                        <td>{{ $society->city }}</td>
                        <td>
                            <span class="badge {{ $society->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($society->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No societies found
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection
