@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Wing</h3>
        <a href="{{ route('admin.wing.index') }}" class="btn btn-secondary">
            ← Back
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.wing.update', $wing->id) }}">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Phase --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Phase</label>
                        <select name="phase_id" class="form-select" required>
                            @foreach($phases as $phase)
                                <option value="{{ $phase->id }}"
                                    {{ $wing->phase_id == $phase->id ? 'selected' : '' }}>
                                    {{ $phase->society->society_name }}
                                    → {{ $phase->phase_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Wing Name --}}
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Wing Name</label>
                        <input type="text"
                               name="wing_name"
                               class="form-control"
                               value="{{ $wing->wing_name }}"
                               required>
                    </div>

                    {{-- Total Floors --}}
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Total Floors</label>
                        <input type="number"
                               name="total_floors"
                               class="form-control"
                               value="{{ $wing->total_floors }}"
                               required>
                    </div>

                </div>

                <button class="btn btn-success">Update Wing</button>
                <a href="{{ route('admin.wing.index') }}" class="btn btn-danger">Cancel</a>

            </form>

        </div>
    </div>

</div>

@endsection
