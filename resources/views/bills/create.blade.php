@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Add Bill</h3>

    <form method="POST" action="{{ route('admin.bills.store') }}">
        @csrf

        {{-- OWNER SELECT DROPDOWN --}}
        <div class="mb-3">
            <label>Select Owner</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select Owner</option>
                @foreach($owners as $owner)
                    <option value="{{ $owner->id }}">
                        {{ $owner->name }} (Owner)
                    </option>
                @endforeach
            </select>
        </div>

        {{-- BILL TYPE --}}
        <div class="mb-3">
            <label>Bill Type</label>
            <select name="bill_type" class="form-control" required>
                @foreach($billTypes as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>

        {{-- AMOUNT --}}
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>

        {{-- DUE DATE --}}
        <div class="mb-3">
            <label>Due Date</label>
            <input type="date" name="due_date" class="form-control">
        </div>

        <button class="btn btn-success">Save Bill</button>
        <a href="{{ route('admin.bills.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
