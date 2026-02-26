@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Parking Management</h3>

    {{-- ADMIN + SECURITY ADD ENTRY --}}
    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'security')
        <a href="{{ route('admin.parkings.create') }}" class="btn btn-success mb-3">
            Add Parking Entry
        </a>
    @endif


<table class="table table-bordered datatable">

    <thead class="table-dark">
            <tr>
                <th>Vehicle No</th>
                <th>Owner</th>
                <th>Type</th>
                <th>Slot</th>
                <th>Status</th>
                <th>Entry Time</th>
                <th>Exit Time</th>
                <th width="200">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($parkings as $p)
            <tr>
                <td>{{ $p->vehicle_number }}</td>
                <td>{{ $p->owner_name }}</td>
                <td>{{ $p->vehicle_type }}</td>
                <td>{{ $p->slot_number }}</td>

                <td>
                    @if($p->status == 'Parked')
                        <span class="badge bg-success">Parked</span>
                    @else
                        <span class="badge bg-danger">Exited</span>
                    @endif
                </td>

                <td>{{ $p->entry_time ? date('d M Y h:i A', strtotime($p->entry_time)) : '-' }}</td>
                <td>{{ $p->exit_time ? date('d M Y h:i A', strtotime($p->exit_time)) : '-' }}</td>


                <td>

                    {{-- ADMIN ONLY --}}
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.parkings.edit',$p->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <form action="{{ route('admin.parkings.destroy',$p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif


                    {{-- ADMIN + SECURITY EXIT --}}
                    @if($p->status == 'Parked' &&
   in_array(auth()->user()->role, ['admin','security','owner']))

    <a href="{{ route('admin.parkings.exit',$p->id) }}"
       onclick="return confirm('Confirm vehicle exit?')"
       class="btn btn-warning btn-sm">
        Exit
    </a>

@endif

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
