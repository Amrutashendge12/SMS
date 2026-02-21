@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Notice Details</h3>

    <div class="card">
        <div class="card-body">

            <h4>{{ $notice->title }}</h4>

            <p><strong>Type:</strong> {{ $notice->notice_type }}</p>

            <p><strong>Date:</strong> {{ $notice->notice_date }}</p>

            <p>{{ $notice->description }}</p>

        </div>
    </div>

    <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary mt-3">
        Back
    </a>

</div>
@endsection
