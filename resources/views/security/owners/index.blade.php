@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Owner / Member List</h3>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered datatable">

                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Family Members</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if($member->profile_photo)
                                    <img src="{{ asset('storage/'.$member->profile_photo) }}"
                                         width="40" height="40"
                                         class="rounded-circle">
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>

                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->mobile }}</td>
                            <td>{{ $member->total_family_members }}</td>
                            <td>
                                <span class="badge bg-secondary">Read Only</span>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No members found
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
