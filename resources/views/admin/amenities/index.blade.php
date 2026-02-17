@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Amenities List</h3>

    <a href="{{ route('admin.amenities.create') }}" class="btn btn-primary mb-3">
        Add Amenity
    </a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Charges</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($amenities as $a)
            <tr>
                <td>{{ $a->name }}</td>
                <td>{{ $a->description }}</td>
                <td>₹ {{ $a->charges }}</td>

                <td>
                    @if($a->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.amenities.edit',$a->id) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.amenities.destroy',$a->id) }}"
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
