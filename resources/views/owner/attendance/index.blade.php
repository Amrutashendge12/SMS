<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Security Name</th>
            <th>Date</th>
            <th>In Time</th>
            <th>Out Time</th>
            <th>Hours</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attendances as $attendance)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $attendance->security->name }}</td>
            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
            <td>{{ $attendance->in_time }}</td>
            <td>{{ $attendance->out_time }}</td>
            <td>8 hrs</td>
        </tr>
        @endforeach
    </tbody>
</table>
