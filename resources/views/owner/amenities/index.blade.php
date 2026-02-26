@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Available Amenities</h2>

<table class="table table-bordered datatable">

    <thead>
            <tr>
                <th>Amenity Name</th>
                <th>Charges</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($amenities as $a)
        <tr>
            <td>{{ $a->name }}</td>
            <td>₹ {{ $a->charges }}</td>
            <td>
                <a href="{{ route('owner.amenities.book',$a->id) }}"
                   class="btn btn-primary btn-sm">
                    Book
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">
                No Amenities Available
            </td>
        </tr>
        @endforelse

        </tbody>
    </table>

</div>

@endsection
