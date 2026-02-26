@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">My Bills</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered datatable">

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
                    @forelse($bills as $bill)
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
                            @if($bill->status == 'Pending')
                                <form action="{{ route('owner.bills.pay', $bill->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Pay Now
                                    </button>
                                </form>
                            @else
                                <span class="text-success fw-bold">Paid ✔</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No Bills Found</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
