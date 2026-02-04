@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Add Flat</h3>
        <a href="{{ route('admin.flat.index') }}" class="btn btn-secondary">
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

            <form method="POST" action="{{ route('admin.flat.store') }}">
                @csrf

                <div class="row">

                    {{-- Wing Select --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Select Wing</label>
                        <select name="wing_id" class="form-select" required>
                            <option value="">-- Select Wing --</option>
                            @foreach($wings as $wing)
                                <option value="{{ $wing->id }}">
                                    {{ $wing->phase->society->society_name }}
                                    → {{ $wing->phase->phase_name }}
                                    → Wing {{ $wing->wing_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Flat Number --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flat Number</label>
                        <input type="text"
                               name="flat_number"
                               class="form-control"
                               placeholder="101"
                               value="{{ old('flat_number') }}"
                               required>
                    </div>

                    {{-- Floor No --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Floor Number</label>
                        <input type="number"
                               name="floor_no"
                               class="form-control"
                               placeholder="1"
                               value="{{ old('floor_no') }}"
                               required>
                    </div>

                    {{-- Flat Type --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flat Type</label>
                        <select name="flat_type" class="form-select" required>
                            <option value="">-- Select Flat Type --</option>
                            <option value="1RK">1 RK</option>
                            <option value="1BHK">1 BHK</option>
                            <option value="2BHK">2 BHK</option>
                            <option value="3BHK">3 BHK</option>
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Save Flat
                    </button>
                    <a href="{{ route('admin.flat.index') }}" class="btn btn-danger">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
