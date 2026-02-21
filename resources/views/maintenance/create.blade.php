@extends('layouts.app')

@section('content')
<div class="container">
<h2>Add Maintenance</h2>

<form action="{{ route('owner.maintenance.store') }}" method="POST">
@csrf

<input class="form-control mb-2" name="society_name" placeholder="Society Name">
<input class="form-control mb-2" name="phase_name" placeholder="Phase">
<input class="form-control mb-2" name="wing" placeholder="Wing">
<input class="form-control mb-2" name="floor" placeholder="Floor">
<input class="form-control mb-2" name="flat_no" placeholder="Flat No">
<input class="form-control mb-2" name="owner_name" placeholder="Owner Name">

<input class="form-control mb-2" name="amount" placeholder="Amount">
<input class="form-control mb-2" type="date" name="due_date">

<select class="form-control mb-2" name="status">
    <option value="pending">Pending</option>
    <option value="paid">Paid</option>
</select>

<select class="form-control mb-2" name="payment_mode">
    <option>Cash</option>
    <option>UPI</option>
    <option>Online</option>
</select>

<textarea class="form-control mb-2" name="remark" placeholder="Remark"></textarea>

<button class="btn btn-success">Save</button>

</form>
</div>
@endsection
