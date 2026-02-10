@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Wing List</h3>
      
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Society</th>
                            <th>Phase</th>
                            <th>Wing</th>
                            <th>Total Floors</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($wings as $wing)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $wing->phase->society->society_name }}</td>
                            <td>{{ $wing->phase->phase_name }}</td>
                            <td>{{ $wing->wing_name }}</td>
                            <td>{{ $wing->total_floors }}</td>
                           
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No wings found
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
