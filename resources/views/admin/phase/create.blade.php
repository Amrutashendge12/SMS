@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Add Phase</h3>
        <a href="{{ route('admin.phase.index') }}" class="btn btn-secondary">
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

            <form method="POST" action="{{ route('admin.phase.store') }}">
                @csrf

                <div class="row">

                    {{-- Society --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Society</label>
                        <select name="society_id" class="form-select" required>
                            <option value="">-- Select Society --</option>
                            @foreach($societies as $society)
                                <option value="{{ $society->id }}"
                                    {{ old('society_id') == $society->id ? 'selected' : '' }}>
                                    {{ $society->society_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Phase Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phase Name</label>
                        <input type="text"
                               name="phase_name"
                               class="form-control"
                               placeholder="Phase 1"
                               value="{{ old('phase_name') }}"
                               required>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Save Phase
                    </button>
                    <a href="{{ route('admin.phase.index') }}" class="btn btn-danger">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
