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
                    <h2>{{ $societiesCount }}</h2>
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
                    <h2>{{ $phasesCount }}</h2>
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
                    <h2>{{ $wingsCount }}</h2>
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
                    <h2>{{ $flatsCount }}</h2>
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
                    <h2>{{ $securitiesCount }}</h2>
                </div>
            </div>
        </a>
    </div>

     <div class="col-md-3">
        <a href="{{ route('owner.maintenance.index') }}" class="text-decoration-none">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Total maintenance</h5>
                    <h2>{{ $totalMaintenance }}</h2>
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
                <h2>{{ $eventsCount }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-3 mt-3">
    <a href="{{ route('owner.visitors.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Total Visitors</h5>
                <h2>{{ $totalVisitors }}</h2>
            </div>
        </div>
    </a>
</div>


<div class="col-md-3">
    <a href="{{ route('owner.notices.index') }}" class="text-decoration-none">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5>Total Notices</h5>
                <h2>{{ $latestNotices }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('owner.amenities.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Total Amenities</h5>
                <h2>{{ $totalAmenities }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('owner.amenities.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>My Amenity Bookings</h5>
                <h2>{{ $myBookings }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-3 mt-3">
    <a href="{{ route('owner.amenities.my') }}" class="text-decoration-none">
        <div class="card bg-warning text-white">
            <div class="card-body text-center">
                <h5>Total Bookings</h5>
                <h2>{{ $totalBookings }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-3 mt-3">
    <a href="{{ route('owner.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Vehicles</h5>
                <h2>{{ $totalParking }}</h2>
            </div>
        </div>
    </a>
</div>

<div class="col-md-3 mt-3">
    <a href="{{ route('owner.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Currently Parked</h5>
                <h2>{{ $parkedVehicles }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="col-md-3 mt-3">
    <a href="{{ route('owner.parkings.index') }}" class="text-decoration-none">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5>Exited Vehicles</h5>
                <h2>{{ $exitedVehicles }}</h2>
            </div>
        </div>
    </a>
</div>
<div class="row">

    <div class="col-md-3 mt-3">
        <a href="{{ route('owner.bills.index') }}" class="text-decoration-none">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>My Total Bills</h5>
                    <h2>{{ $myTotalBills }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mt-3">
        <a href="{{ route('owner.bills.index') }}" class="text-decoration-none">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Paid Bills</h5>
                    <h2>{{ $myPaidBills }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mt-3">
        <a href="{{ route('owner.bills.index') }}" class="text-decoration-none">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Pending Bills</h5>
                    <h2>{{ $myPendingBills }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mt-3">
        <a href="{{ route('owner.bills.index') }}" class="text-decoration-none">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Due Amount</h5>
                    <h2>₹ {{ $myDueAmount }}</h2>
                </div>
            </div>
        </a>
    </div>

<div class="col-md-3 mt-4 mb-4">

    <div class="card shadow-sm border-0 text-center">

        <div class="card-body py-3">

            <h6 class="card-title mb-1">Complaints</h6>

            <p class="text-muted small mb-2">
                Manage society complaints
            </p>

            @if(auth()->user()->role == 'admin')

                <a href="{{ route('complaints.index') }}"
                   class="btn btn-primary btn-sm">
                    View
                </a>

            @else

                <a href="{{ route('complaints.index') }}"
                   class="btn btn-primary btn-sm">
                    My
                </a>

                <a href="{{ route('complaints.create') }}"
                   class="btn btn-success btn-sm">
                    + Raise
                </a>

            @endif

        </div>

    </div>

</div>

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
