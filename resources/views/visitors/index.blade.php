@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Visitor Entry List</h3>

    <a href="{{ route('security.visitors.create') }}" class="btn btn-primary mb-3">
        Add Visitor Entry
    </a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Flat</th>
                <th>Purpose</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($visitors as $v)
            <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->phone }}</td>

                <td>
                    {{ $v->flat->wing->phase->society->society_name ?? '' }} /
                    {{ $v->flat->wing->phase->phase_name ?? '' }} /
                    {{ $v->flat->wing->wing_name ?? '' }} /
                    Flat {{ $v->flat->flat_number ?? 'Data Missing' }}
                </td>

                <td>{{ $v->purpose }}</td>
                <td>{{ $v->check_in }}</td>
                <td>{{ $v->check_out ?? 'Still Inside' }}</td>

                <td>
                    @if(!$v->check_out)
                        <a href="{{ route('security.visitors.exit',$v->id) }}"
                           class="btn btn-sm btn-danger">
                            Mark Exit
                        </a>
                    @else
                        <span class="badge bg-success">Exited</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
