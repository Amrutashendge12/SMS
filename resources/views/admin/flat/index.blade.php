@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Flat List</h3>
        <a href="{{ route('admin.flat.create') }}" class="btn btn-primary">
            + Add Flat
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
                <table id="flatTable" class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Society</th>
                            <th>Phase</th>
                            <th>Wing</th>
                            <th>Flat No</th>
                            <th>Floor</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($flats as $flat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $flat->wing->phase->society->society_name }}</td>
                            <td>{{ $flat->wing->phase->phase_name }}</td>
                            <td>{{ $flat->wing->wing_name }}</td>
                            <td>{{ $flat->flat_number }}</td>
                            <td>{{ $flat->floor_no }}</td>
                            <td>{{ $flat->flat_type }}</td>
                            <td>
                                @if($flat->status == 'occupied')
                                    <span class="badge bg-danger">Occupied</span>
                                @else
                                    <span class="badge bg-success">Available</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.flat.edit', $flat->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.flat.destroy', $flat->id) }}"
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
                            <td colspan="9" class="text-center text-muted">
                                No flats found
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@section('scripts')
<script>
$(document).ready(function () {
    $('#flatTable').DataTable();
});
</script>
@endsection
@endsection
