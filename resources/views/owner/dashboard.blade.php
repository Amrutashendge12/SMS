@extends('layouts.app')

@section('content')

<h2>Owner Dashboard</h2>
<p class="text-muted">Welcome Owner, manage your society efficiently.</p>

<div class="row">

    <!-- Total Societies -->
    <div class="col-md-3 mb-3">
        <a href="{{ route('owner.societies.index') }}" class="text-decoration-none">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Societies</h5>
                    <h2>{{ $totalSocieties }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- Total Phases -->
    <div class="col-md-3 mb-3">
        <a href="{{ route('owner.phases.index') }}" class="text-decoration-none">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Phases</h5>
                    <h2>{{ $totalPhases }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- Total Wings -->
    <div class="col-md-3 mb-3">
        <a href="{{ route('owner.wings.index') }}" class="text-decoration-none">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Total Wings</h5>
                    <h2>{{ $totalWings }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- Total Flats -->
    <div class="col-md-3 mb-3">
        <a href="{{ route('owner.flats.index') }}" class="text-decoration-none">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Flats</h5>
                    <h2>{{ $totalFlats }}</h2>
                </div>
            </div>
        </a>
    </div>

     {{-- Total Securities --}}
    <div class="col-md-3">
        <a href="{{ route('owner.securities.index') }}" class="text-decoration-none">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Total Securities</h5>
                    <h2>{{ $totalSecurities }}</h2>
                </div>
            </div>
        </a>
    </div>
    {{-- Today's Attendance --}}
<div class="col-md-3 mt-3">
    <a href="{{ route('owner.attendance.index') }}" class="card-link text-decoration-none">
        <div class="card text-white bg-danger shadow">
            <div class="card-body text-center">
                <h5>Today's Attendance</h5>
                <h2>{{ $todayAttendance }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('owner.events.index') }}" class="card-link">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5>Total Events</h5>
                <h2>{{ $totalEvents }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header fw-bold">
                📊 Owner Overview
            </div>
            <div class="card-body">
                <canvas id="ownerChart" height="120"></canvas>
            </div>
        </div>
    </div>
</div>


</div>
   
<style>
    .card {
        cursor: pointer;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('ownerChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Count',
                data: {!! json_encode($chartData) !!},
                backgroundColor: [
                    '#0d6efd',
                    '#198754',
                    '#ffc107',
                    '#0dcaf0',
                    '#6c757d'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });

});
</script>

@endsection
