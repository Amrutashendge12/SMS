@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Member List</h3>
        <a href="{{ route('admin.member.create') }}" class="btn btn-primary">
            + Add Member
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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Family Members</th>
                            <th width="220">Action</th>
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
                                <a href="{{ route('admin.member.show', $member->id) }}"
                                   class="btn btn-sm btn-info">
                                    View
                                </a>

                                <a href="{{ route('admin.member.edit', $member->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.member.destroy', $member->id) }}"
      method="POST"
      class="delete-form">
    @csrf
    @method('DELETE')

    <button type="button" class="btn btn-danger btn-sm delete-btn">
        Delete
    </button>
</form>

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
