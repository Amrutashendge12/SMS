@extends('layouts.app')

@section('content')
<h2>Admin Dashboard</h2>
<p class="text-muted">Welcome Admin, you have full control.</p>

<div class="row">

    {{-- Owners --}}
    
        <div class="col-md-3">
    <a href="{{ route('admin.member.index') }}" class="text-decoration-none">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Owners</h5>
                <h2>{{ $owners }}</h2>
            </div>
        </div>
    </a>
</div>


    {{-- Societies --}}
    <div class="col-md-3">
        <a href="{{ route('admin.society.index') }}" class="text-decoration-none">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Total Societies</h5>
                    <h2>{{ $societies }}</h2>
                </div>
            </div>
        </a>
    </div>

    {{-- Phases --}}
    <div class="col-md-3">
        <a href="{{ route('admin.phase.index') }}" class="text-decoration-none">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Total Phases</h5>
                    <h2>{{ $phases }}</h2>
                </div>
            </div>
        </a>
    </div>

    {{-- Wings --}}
    <div class="col-md-3">
        <a href="{{ route('admin.wing.index') }}" class="text-decoration-none">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Wings</h5>
                    <h2>{{ $wings }}</h2>
                </div>
            </div>
        </a>
    </div>

    {{-- Flats --}}
    <div class="col-md-3 mt-3">
        <a href="{{ route('admin.flat.index') }}" class="text-decoration-none">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5>Total Flats</h5>
                    <h2>{{ $flats }}</h2>
                </div>
            </div>
        </a>
    </div>

     {{-- Total Securities --}}
    <div class="col-md-3 mt-3">
        <a href="{{ route('admin.securities.index') }}" class="card-link">
            <div class="card text-white bg-secondary shadow">
                <div class="card-body">
                    <h5>Total Securities</h5>
                    <h2>{{ $totalSecurities }}</h2>
                </div>
            </div>
        </a>
    </div>

    {{-- Today's Attendance --}}
    <div class="col-md-3 mt-3">
        <a href="{{ route('admin.attendance.index') }}" class="card-link">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5>Today's Attendance</h5>
                    <h2>{{ $todayAttendance }}</h2>
                </div>
            </div>
        </a>
    </div>

    {{-- Total Events --}}
<div class="col-md-3 mt-3">
    <a href="{{ route('admin.events.index') }}" class="card-link">
        <div class="card text-white bg-primary shadow">
            <div class="card-body">
                <h5>Total Events</h5>
                <h2>{{ $totalEvents }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
        <a href="{{ route('admin.maintenance.index') }}" class="card-link">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Total maintenance</h5>
                    <h2>{{ $totalMaintenance }}</h2>
                </div>
            </div>
        </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.visitors.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Total Visitors</h5>
                <h2>{{ $totalVisitors }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.amenities.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Total Amenities</h5>
                <h2>{{ $totalAmenities }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.bookings.pending') }}" class="text-decoration-none">
        <div class="card bg-info text-white">
            <div class="card-body text-center">
                <h5>Total Amenity Bookings</h5>
                <h2>{{ $totalBookings }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-3 mt-3">
    <a href="{{ route('admin.bookings.pending') }}" class="text-decoration-none">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h5>Pending Requests</h5>
                <h2>{{ $pendingBookings }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.notices.index') }}" class="text-decoration-none">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5>Total Notices</h5>
                <h2>{{ $latestNotices }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Vehicles</h5>
                <h2>{{ $totalParking }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Currently Parked</h5>
                <h2>{{ $parkedVehicles }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-3 mt-3">
    <a href="{{ route('admin.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Exited Vehicles</h5>
                <h2>{{ $exitedVehicles }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('admin.bills.index') }}" class="text-decoration-none">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Bills</h5>
                <h2>{{ $totalBills }}</h2>
            </div>
        </div>
    </a>
</div>


<div class="col-md-3 mt-3">
    <a href="{{ route('admin.bills.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Paid Bills</h5>
                <h2>{{ $paidBills }}</h2>
            </div>
        </div>
    </a>
</div>


<div class="col-md-3 mt-3">
    <a href="{{ route('admin.bills.index') }}" class="text-decoration-none">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Pending Bills</h5>
                <h2>{{ $pendingBills }}</h2>
            </div>
        </div>
    </a>
</div>


<div class="col-md-3 mt-3">
    <a href="{{ route('admin.bills.index') }}" class="text-decoration-none">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5>Total Due Amount</h5>
                <h2>₹ {{ $totalDue }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mb-4">
    <div class="card shadow-sm border-0 text-center h-100">

        <div class="card-body d-flex flex-column justify-content-center">

            <h5 class="card-title mb-2">Complaints</h5>

            <p class="text-muted small mb-3">
                Raise and manage society complaints
            </p>

            <a href="{{ route('complaints.index') }}"
               class="btn btn-primary btn-sm">
                View Complaints
            </a>

            @if(auth()->user()->role != 'admin')
                <a href="{{ route('complaints.create') }}"
                   class="btn btn-success btn-sm mt-2">
                    + Raise Complaint
                </a>
            @endif

        </div>

    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header fw-bold">
                📊 Admin Overview
            </div>
            <div class="card-body">
                <canvas id="adminChart" height="120"></canvas>
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
    <div class="col-md-8">   <!-- ⭐ width kami keli -->
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h5>Maintenance Monthly Graph</h5>
            </div>

            <div class="card-body">

                <!-- SMALL FIXED SIZE CONTAINER -->
                <div style="width:100%; height:250px;">
                    <canvas id="maintenanceChart"></canvas>
                </div>

            </div>
        </div>
    </div>
</div>

</div>

{{-- Optional hover effect --}}
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

    const ctx = document.getElementById('adminChart');
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
