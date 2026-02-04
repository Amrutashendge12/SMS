@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Dashboard</h3>

    {{-- INFO CARDS --}}
    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h6>Total Societies</h6>
                    <h3>12</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h6>Total Phases</h6>
                    <h3>8</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h6>Total Wings</h6>
                    <h3>25</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger h-100">
                <div class="card-body">
                    <h6>Total Flats</h6>
                    <h3>300</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- WELCOME MESSAGE --}}
    <div class="card mt-4">
        <div class="card-body">
            <h5>Welcome, {{ auth()->user()->name }} 👋</h5>
            <p class="mb-0">You are logged in as <strong>{{ auth()->user()->role }}</strong>.</p>
        </div>
    </div>

</div>

@endsection
