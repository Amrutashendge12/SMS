@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📊 Society Reports</h2>

    <div class="row g-3">

        <a href="{{ route('admin.reports.pdf') }}" class="btn btn-danger mb-3">
            Download PDF
        </a>

        <div class="col-md-3">
            <div class="card bg-info text-white p-3">
                <h6>Total Events</h6>
                <h3>{{ $totalEvents }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-secondary text-white p-3">
                <h6>Total Maintenances</h6>
                <h3>{{ $totalMaintenances }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-primary text-white p-3">
                <h6>Total Bills</h6>
                <h3>{{ $totalBills }}</h3>
                <small>Paid: {{ $paidBills }} | Pending: {{ $pendingBills }}</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white p-3">
                <h6>Total Collection</h6>
                <h3>₹ {{ $totalCollection }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white p-3">
                <h6>Total Complaints</h6>
                <h3>{{ $totalComplaints }}</h3>
                <small>Open: {{ $openComplaints }} | Closed: {{ $closedComplaints }}</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-dark text-white p-3">
                <h6>Total Visitors</h6>
                <h3>{{ $totalVisitors }}</h3>
                <small>Today: {{ $todayVisitors }}</small>
            </div>
        </div>

    </div>
</div>
@endsection