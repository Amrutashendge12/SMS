@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Notice</h3>

    <form method="POST" action="{{ route('admin.notices.store') }}">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Notice Date</label>
            <input type="date" name="notice_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Notice Type</label>
            <select name="notice_type" class="form-control" required>
                <option value="">Select Type</option>
                <option>Water Supply</option>
                <option>Electricity / Maintenance</option>
                <option>Cleaning / Repair</option>
                <option>Maintenance Payment</option>
                <option>Event</option>
                <option>Meeting</option>
                <option>Construction</option>
                <option>Emergency</option>
            </select>
        </div>

        <button class="btn btn-success">Save Notice</button>
        <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
