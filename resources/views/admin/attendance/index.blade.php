@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-3">Security Attendance Report</h3>

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Security Name</th>
                        <th>Mobile</th>
                        <th>Date</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($attendances as $att)
                        <tr>
                            <td>{{ $att->security->name ?? '-' }}</td>
                            <td>{{ $att->security->mobile ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($att->date)->format('d-m-Y') }}</td>
                            <td>{{ $att->in_time ?? '-' }}</td>
                            <td>{{ $att->out_time ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No attendance records found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
