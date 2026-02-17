@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Edit Notice</h3>

    <form method="POST" action="{{ route('admin.notices.update',$notice->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title"
                   value="{{ $notice->title }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description"
                      class="form-control" required>{{ $notice->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Notice Date</label>
            <input type="date" name="notice_date"
                   value="{{ $notice->notice_date }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Notice Type</label>
            <select name="notice_type" class="form-control" required>
                <option {{ $notice->notice_type=='Water Supply'?'selected':'' }}>Water Supply</option>
                <option {{ $notice->notice_type=='Electricity / Maintenance'?'selected':'' }}>Electricity / Maintenance</option>
                <option {{ $notice->notice_type=='Cleaning / Repair'?'selected':'' }}>Cleaning / Repair</option>
                <option {{ $notice->notice_type=='Maintenance Payment'?'selected':'' }}>Maintenance Payment</option>
                <option {{ $notice->notice_type=='Event'?'selected':'' }}>Event</option>
                <option {{ $notice->notice_type=='Meeting'?'selected':'' }}>Meeting</option>
                <option {{ $notice->notice_type=='Construction'?'selected':'' }}>Construction</option>
                <option {{ $notice->notice_type=='Emergency'?'selected':'' }}>Emergency</option>
            </select>
        </div>

        <button class="btn btn-success">Update Notice</button>
        <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
