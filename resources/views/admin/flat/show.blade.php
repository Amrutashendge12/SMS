@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Flat Details</h3>
        <a href="{{ route('admin.flat.index') }}" class="btn btn-secondary">← Back</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="200">Society</th>
                    <td>{{ $flat->wing->phase->society->society_name }}</td>
                </tr>

                <tr>
                    <th>Phase</th>
                    <td>{{ $flat->wing->phase->phase_name }}</td>
                </tr>

                <tr>
                    <th>Wing</th>
                    <td>Wing {{ $flat->wing->wing_name }}</td>
                </tr>

                <tr>
                    <th>Flat Number</th>
                    <td>{{ $flat->flat_number }}</td>
                </tr>

                <tr>
                    <th>Floor</th>
                    <td>{{ $flat->floor_no }}</td>
                </tr>

                <tr>
                    <th>Type</th>
                    <td>{{ $flat->flat_type }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if($flat->status == 'occupied')
                            <span class="badge bg-danger">Occupied</span>
                        @else
                            <span class="badge bg-success">Vacant</span>
                        @endif
                    </td>
                </tr>

            </table>

        </div>
    </div>

</div>

@endsection