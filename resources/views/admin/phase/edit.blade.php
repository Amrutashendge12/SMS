@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Phase</h3>
        <a href="{{ route('admin.phase.index') }}" class="btn btn-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.phase.update', $phase->id) }}">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Society</label>
                        <select name="society_id" class="form-select" required>
                            @foreach($societies as $society)
                                <option value="{{ $society->id }}"
                                    {{ $phase->society_id == $society->id ? 'selected' : '' }}>
                                    {{ $society->society_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phase Name</label>
                        <input type="text"
                               name="phase_name"
                               class="form-control"
                               value="{{ $phase->phase_name }}"
                               required>
                    </div>

                </div>

                <button class="btn btn-success">Update Phase</button>
                <a href="{{ route('admin.phase.index') }}" class="btn btn-danger">Cancel</a>

            </form>

        </div>
    </div>

</div>

@endsection
