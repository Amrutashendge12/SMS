@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h3>All Bills</h3>

        @if(auth()->user()->role == 'owner')
            <a href="{{ route('bills.create') }}" class="btn btn-primary">Add Bill</a>
        @endif
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Bill Type</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($bills as $bill)
            <tr>
                <td>{{ $bill->id }}</td>

                <td>{{ $bill->bill_type }}</td>

                <td>₹ {{ $bill->amount }}</td>

                <td>
                    @if($bill->status == 'Paid')
                        <span class="badge bg-success">Paid</span>
                    @else
                        <span class="badge bg-danger">Pending</span>
                    @endif
                </td>

                <td>{{ $bill->due_date }}</td>

                <td>

                    {{-- OWNER CAN PAY --}}
                    @if(auth()->user()->role == 'owner')

                        @if($bill->status == 'Pending')
                            <a href="{{ route('bill.pay',$bill->id) }}" class="btn btn-success btn-sm">
                                Pay
                            </a>
                        @else
                            <span class="text-success fw-bold">Paid ✔</span>
                        @endif

                    {{-- ADMIN & SECURITY --}}
                    @else
                        <span class="text-muted">View Only</span>
                    @endif

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
