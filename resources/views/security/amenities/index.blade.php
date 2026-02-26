@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Amenities List</h2>

<table class="table table-bordered datatable">

    <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Charges</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($amenities as $amenity)
            <tr>
                <td>{{ $amenity->name }}</td>
                <td>{{ $amenity->description }}</td>
                <td>₹ {{ $amenity->charges }}</td>
                <td>
                    @if($amenity->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
