@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Phase List</h3>
        <a href="{{ route('admin.phase.create') }}" class="btn btn-primary">
            + Add Phase
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
                <table id="securityTable" class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Society</th>
                            <th>Phase</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($phases as $phase)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $phase->society->society_name }}</td>
                            <td>{{ $phase->phase_name }}</td>
                            <td>
                                <a href="{{ route('admin.phase.edit', $phase->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.phase.destroy', $phase->id) }}"
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
                            <td colspan="4" class="text-center text-muted">
                                No phases found
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
    $('#securityTable').DataTable();
});
</script>
@endsection

@endsection
