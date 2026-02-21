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
            <a href="{{ route('security.events.index') }}" class=" text-decoration-none">
                <div class="card shadow-sm border-dark h-100">
                    <div class="card-body text-center">
                        <h5 class="text-muted">Total Events</h5>
                        <h2 class="fw-bold text-dark">{{ $eventsCount }}</h2>
                     </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mt-3">
            <a href="{{ route('security.maintenance.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-dark h-100">
                    <div class="card-body text-center">
                        <h5>Total maintenance</h5>
                        <h2>{{ $totalMaintenance }}</h2>
                    </div>
                </div>
            </a>
        </div>

<div class="col-md-3 mt-3">
    <a href="{{ route('security.visitors.index') }}" class="text-decoration-none">
        <div class="card shadow-sm border-primary h-100">
            <div class="card-body text-center"></div>
                <h5>Total Visitors</h5>
                <h2>{{ $totalVisitors }}</h2>
            </div>
        </div>
    </a>
</div>

</div>

<div class="row">

    {{-- Total Notices --}}
    <div class="col-md-3 mt-3">
        <a href="{{ route('security.notices.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-dark h-100">
                <div class="card-body text-center">
                    <h5>Total Notices</h5>
                    <h2>{{ $latestNotices }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mt-3">
        <a href="{{ route('security.amenities.index') }}" class="text-decoration-none">
        <div class="card shadow-sm border-success h-100">
            <div class="card-body text-center">
                <h5>Total Amenities</h5>
                <h2>{{ $totalAmenities }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('security.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Vehicles</h5>
                <h2>{{ $totalParking }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Currently Parked</h5>
                <h2>{{ $parkedVehicles }}</h2>
            </div>
        </div>
</div>

<div class="col-md-3 mt-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Exited Vehicles</h5>
                <h2>{{ $exitedVehicles }}</h2>
            </div>
        </div>
</div>



</div>

    {{-- DASHBOARD CHART --}}
   
<div class="row mt-4">

    <!-- Society Overview -->
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

    <!-- Visitor Trend -->
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold">
                📈 Daily Visitor Trend
            </div>
            <div class="card-body">
                <canvas id="visitorChart" height="120"></canvas>
            </div>
        </div>
    </div>

</div>


<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h5>Maintenance Monthly Graph</h5>
            </div>
            <div class="card-body">

                <!-- SMALL CHART CONTAINER -->
                <div style=" width:100%; height:300px;">
                    <canvas id="maintenanceChart"></canvas>
                </div>

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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('maintenanceChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($months),
        datasets: [{
            label: 'Maintenance Records',
            data: @json($counts),
            backgroundColor: '#ffc107',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,   // ⭐ MUST
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let labels = @json($visitorTrend->pluck('date'));
    let totals = @json($visitorTrend->pluck('total'));

    new Chart(document.getElementById('visitorChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Visitors Per Day',
                data: totals
            }]
        }
    });
</script>

@endsection
