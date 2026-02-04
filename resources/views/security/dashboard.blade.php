@extends('layouts.app')

@section('content')
<h2>Security Dashboard</h2>
<p class="text-muted">Manage visitor entries.</p>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card text-bg-secondary">
            <div class="card-body">
                <h5>Add Visitor</h5>
                <p>New visitor entry</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-bg-dark">
            <div class="card-body">
                <h5>Today Visitors</h5>
                <p>Dynamic List</p>
            </div>
        </div>
    </div>
</div>
@endsection
