@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Security</h3>
        <a href="{{ route('admin.securities.index') }}" class="btn btn-secondary">
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

            <form method="POST"
                  action="{{ route('admin.securities.update', $security->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Security Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $security->name) }}"
                               required>
                    </div>

                    {{-- Mobile --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text"
                               name="mobile"
                               class="form-control"
                               value="{{ old('mobile', $security->mobile) }}"
                               required>
                    </div>

                    {{-- Shift --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Shift</label>
                        <select name="shift" class="form-select">
                            <option value="">-- Select Shift --</option>
                            <option value="Day"
                                {{ $security->shift == 'Day' ? 'selected' : '' }}>
                                Day
                            </option>
                            <option value="Night"
                                {{ $security->shift == 'Night' ? 'selected' : '' }}>
                                Night
                            </option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ $security->status ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ !$security->status ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Update Security
                    </button>
                    <a href="{{ route('admin.securities.index') }}" class="btn btn-danger">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
