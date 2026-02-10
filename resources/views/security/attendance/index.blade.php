@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Attendance List</h3>

        <a href="{{ route('security.attendance.create') }}"
           class="btn btn-success">
            ➕ Mark Attendance
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Marked At</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- Static example (DB नंतर replace करशील) --}}
                    <tr>
                        <td>1</td>
                        <td>{{ date('d-m-Y') }}</td>
                        <td>
                            <span class="badge bg-success">Present</span>
                        </td>
                        <td>{{ date('h:i A') }}</td>
                    </tr>

                    {{-- DB empty असेल तर --}}
                    {{--
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No attendance records found
                        </td>
                    </tr>
                    --}}

                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
