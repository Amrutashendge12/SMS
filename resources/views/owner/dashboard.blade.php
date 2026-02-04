@extends('layouts.app')

@section('content')
<h2>Owner Dashboard</h2>
<p class="text-muted">Welcome, view your society details.</p>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-bg-info">
            <div class="card-body">
                <h5>My Flat</h5>
                <p>Flat No / Building</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-success">
            <div class="card-body">
                <h5>Maintenance Status</h5>
                <p>Paid / Pending</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-bg-warning">
            <div class="card-body">
                <h5>Notices</h5>
                <p>View Society Notices</p>
            </div>
        </div>
    </div>
</div>
@endsection
