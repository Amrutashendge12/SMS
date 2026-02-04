@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Wing List</h3>
        <a href="{{ route('admin.wing.create') }}" class="btn btn-primary">
            + Add Wing
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Society</th>
                            <th>Phase</th>
                            <th>Wing</th>
                            <th>Total Floors</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($wings as $wing)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $wing->phase->society->society_name }}</td>
                            <td>{{ $wing->phase->phase_name }}</td>
                            <td>{{ $wing->wing_name }}</td>
                            <td>{{ $wing->total_floors }}</td>
                            <td>
                                <a href="{{ route('admin.wing.edit', $wing->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.wing.destroy', $wing->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No wings found
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
