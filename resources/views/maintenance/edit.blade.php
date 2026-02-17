@extends('layouts.app')

@section('content')
<div class="container">
<h2>Edit Maintenance</h2>

<form action="{{ route('owner.maintenance.update',$maintenance->id) }}" method="POST">
@csrf
@method('PUT')

<input class="form-control mb-2" name="society_name" value="{{ $maintenance->society_name }}">
<input class="form-control mb-2" name="phase_name" value="{{ $maintenance->phase_name }}">
<input class="form-control mb-2" name="wing" value="{{ $maintenance->wing }}">
<input class="form-control mb-2" name="floor" value="{{ $maintenance->floor }}">
<input class="form-control mb-2" name="flat_no" value="{{ $maintenance->flat_no }}">
<input class="form-control mb-2" name="owner_name" value="{{ $maintenance->owner_name }}">

<input class="form-control mb-2" name="amount" value="{{ $maintenance->amount }}">
<input class="form-control mb-2" type="date" name="due_date" value="{{ $maintenance->due_date }}">

<select class="form-control mb-2" name="status">
    <option value="pending" {{ $maintenance->status=='pending'?'selected':'' }}>Pending</option>
    <option value="paid" {{ $maintenance->status=='paid'?'selected':'' }}>Paid</option>
</select>

<button class="btn btn-primary">Update</button>

</form>
</div>
@endsection
