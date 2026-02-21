@extends('layouts.app')

@section('content')
<div class="container">

<h2>Maintenance Details</h2>

<ul class="list-group">
<li class="list-group-item">Society: {{ $maintenance->society_name }}</li>
<li class="list-group-item">Phase: {{ $maintenance->phase_name }}</li>
<li class="list-group-item">Wing: {{ $maintenance->wing }}</li>
<li class="list-group-item">Floor: {{ $maintenance->floor }}</li>
<li class="list-group-item">Flat: {{ $maintenance->flat_no }}</li>
<li class="list-group-item">Owner: {{ $maintenance->owner_name }}</li>
<li class="list-group-item">Amount: ₹{{ $maintenance->amount }}</li>
<li class="list-group-item">Status: {{ $maintenance->status }}</li>
<li class="list-group-item">Due Date: {{ $maintenance->due_date }}</li>
<li class="list-group-item">Payment Mode: {{ $maintenance->payment_mode }}</li>
<li class="list-group-item">Remark: {{ $maintenance->remark }}</li>
</ul>

<a href="{{ route('maintenance.index') }}" class="btn btn-secondary mt-3">Back</a>

</div>
@endsection
