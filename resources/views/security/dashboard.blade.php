@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Security Dashboard</h3>

    {{-- ATTENDANCE ACTIONS --}}
    <div class="row mb-4">

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5>Attendance</h5>
                    <p class="text-muted">Mark today attendance</p>
                    <a href="{{ route('security.attendance.create') }}"
                       class="btn btn-success w-100">
                        ➕ Mark Attendance
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5>Attendance List</h5>
                    <p class="text-muted">View attendance records</p>
                    <a href="{{ route('security.attendance.index') }}"
                       class="btn btn-primary w-100">
                        📋 View Attendance
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- STATISTICS CARDS --}}
    <div class="row mb-4">

        {{-- Societies --}}
        <div class="col-md-3 mb-3">
            <a href="{{ route('security.societies.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-primary h-100">
                    <div class="card-body text-center">
                        <h6>Total Societies</h6>
                        <h2 class="text-primary">{{ $societiesCount }}</h2>
                    </div>
                </div>
            </a>
        </div>

        {{-- Phases --}}
        <div class="col-md-3 mb-3">
            <a href="{{ route('security.phases.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-success h-100">
                    <div class="card-body text-center">
                        <h6>Total Phases</h6>
                        <h2 class="text-success">{{ $phasesCount }}</h2>
                    </div>
                </div>
            </a>
        </div>

        {{-- Wings --}}
        <div class="col-md-3 mb-3">
            <a href="{{ route('security.wings.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-warning h-100">
                    <div class="card-body text-center">
                        <h6>Total Wings</h6>
                        <h2 class="text-warning">{{ $wingsCount }}</h2>
                    </div>
                </div>
            </a>
        </div>

        {{-- Flats --}}
        <div class="col-md-3 mb-3">
            <a href="{{ route('security.flats.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-info h-100">
                    <div class="card-body text-center">
                        <h6>Total Flats</h6>
                        <h2 class="text-info">{{ $flatsCount }}</h2>
                    </div>
                </div>
            </a>
        </div>

        {{-- Owners --}}
        <div class="col-md-3 mb-3">
            <a href="{{ route('security.owners.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-dark h-100">
                    <div class="card-body text-center">
                        <h6>Total Owners</h6>
                        <h2 class="text-dark">{{ $ownersCount }}</h2>
                    </div>
                </div>
            </a>
        </div>

<div class="col-md-3 mt-3">
    <a href="{{ route('security.events.index') }}" class="card-link">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5>Total Events</h5>
                <h2>{{ $eventsCount }}</h2>
            </div>
        </div>
    </a>
</div>
    </div>

    {{-- DASHBOARD CHART --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header fw-bold">
                    📊 Society Overview
                </div>
                <div class="card-body">
                    <canvas id="overviewChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- CHART SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('overviewChart');

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
                    '#212529'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

});
</script>

@endsection
