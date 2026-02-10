@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Security List</h3>
        <a href="{{ route('admin.securities.create') }}" class="btn btn-success">
            + Add Security
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Shift</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($securities as $security)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $security->name }}</td>
                            <td>{{ $security->email }}</td>
                            <td>{{ $security->mobile }}</td>
                            <td>{{ $security->shift ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $security->status ? 'success' : 'danger' }}">
                                    {{ $security->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.securities.edit', $security->id) }}"class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('admin.securities.show', $security->id) }}"class="btn btn-sm btn-info">View</a>


<form action="{{ route('admin.securities.destroy', $security->id) }}"
      method="POST"
      class="d-inline delete-form">
    @csrf
    @method('DELETE')

    <button type="button"
            class="btn btn-sm btn-danger delete-btn">
        Delete
    </button>
</form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Security Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-btn').forEach(function (button) {

        button.addEventListener('click', function () {

            let form = this.closest('.delete-form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This security will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });

    });

});
</script>

@endsection
