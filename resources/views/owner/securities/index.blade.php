@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Security List</h3>
       
    </div>

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

@endsection
