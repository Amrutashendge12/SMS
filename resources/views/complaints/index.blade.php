@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h4 class="mb-0">Complaints List</h4>

            {{-- Only Owner & Security can add --}}
            @if(auth()->user()->role != 'admin')
                <a href="{{ route('complaints.create') }}" class="btn btn-light btn-sm">
                    + Raise Complaint
                </a>
            @endif
        </div>

        <div class="card-body">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        <table class="table table-bordered datatable">
            <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th width="200">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($complaints as $complaint)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $complaint->user->name }}</td>
                        <td>{{ $complaint->title }}</td>
                        <td>{{ $complaint->description }}</td>

                        <td>
                            @if($complaint->status == 'pending')
                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>
                            @else
                                <span class="badge bg-success">
                                    Resolved
                                </span>
                            @endif
                        </td>

                        <td>

                            {{-- ADMIN Resolve --}}
                            @if(auth()->user()->role == 'admin' && $complaint->status == 'pending')
                                <a href="{{ route('complaints.resolve',$complaint->id) }}"
                                   class="btn btn-success btn-sm">
                                    Resolve
                                </a>
                            @endif

                            {{-- Owner Delete --}}
                            @if(auth()->id() == $complaint->user_id)
                                <form action="{{ route('complaints.destroy',$complaint->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete complaint?')">
                                        Delete
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No complaints found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
