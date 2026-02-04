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

@endsection
