@extends('layouts.app')

@section('content')

<div class="container-fluid px-4 py-4">

    <h3 class="mb-4 fw-bold">Dashboard</h3>

    {{-- STAT CARDS --}}
    <div class="row g-4">

        <!-- Societies -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg text-white stat-card bg-gradient-primary h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Societies</h6>
                        <h3 class="fw-bold">12</h3>
                    </div>
                    <div class="icon fs-1">🏢</div>
                </div>
            </div>
        </div>

        <!-- Phases -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg text-white stat-card bg-gradient-success h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Phases</h6>
                        <h3 class="fw-bold">8</h3>
                    </div>
                    <div class="icon fs-1">📍</div>
                </div>
            </div>
        </div>

        <!-- Wings -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg text-white stat-card bg-gradient-warning h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Wings</h6>
                        <h3 class="fw-bold">25</h3>
                    </div>
                    <div class="icon fs-1">🏘</div>
                </div>
            </div>
        </div>

        <!-- Flats -->
        <div class="col-md-3">
            <div class="card border-0 shadow-lg text-white stat-card bg-gradient-danger h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6>Total Flats</h6>
                        <h3 class="fw-bold">300</h3>
                    </div>
                    <div class="icon fs-1">🏠</div>
                </div>
            </div>
        </div>

    </div>

    {{-- WELCOME CARD --}}
    <div class="card border-0 shadow-lg mt-5">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-2">
                Welcome, {{ auth()->user()->name }} 👋
            </h5>
            <p class="mb-0 text-muted">
                You are logged in as 
                <strong class="text-primary">
                    {{ auth()->user()->role }}
                </strong>.
            </p>
        </div>
    </div>

</div>

{{-- Custom Styles --}}
<style>
.stat-card {
    transition: all 0.3s ease;
}
.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* Gradient Backgrounds */
.bg-gradient-primary {
    background: linear-gradient(45deg, #4e73df, #224abe);
}
.bg-gradient-success {
    background: linear-gradient(45deg, #1cc88a, #13855c);
}
.bg-gradient-warning {
    background: linear-gradient(45deg, #f6c23e, #dda20a);
}
.bg-gradient-danger {
    background: linear-gradient(45deg, #e74a3b, #be2617);
}
</style>

@endsection