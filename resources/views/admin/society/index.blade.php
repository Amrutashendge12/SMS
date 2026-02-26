@extends('layouts.app')

@section('content')

<h3 class="mb-3">Society List</h3>

<a href="{{ route('admin.society.create') }}" class="btn btn-primary mb-3">
    + Add Society
</a>

<table id="securityTable" class="table table-bordered table-striped align-middle">
       <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Society Name</th>
            <th>Registration No</th>
            <th>City</th>
            <th>Pincode</th>
        </tr>
    </thead>
    <tbody>
        @foreach($societies as $society)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $society->society_name }}</td>
                <td>{{ $society->registration_no }}</td>
                <td>{{ $society->city }}</td>
                <td>{{ $society->pincode }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@section('scripts')
<script>
$(document).ready(function () {
    $('#securityTable').DataTable();
});
</script>
@endsection

@endsection
