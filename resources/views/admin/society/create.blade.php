@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Add Society</h3>
        <a href="{{ route('admin.society.index') }}" class="btn btn-secondary">
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

            <form method="POST" action="{{ route('admin.society.store') }}">
                @csrf

                <div class="row">

                    {{-- Society Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Society Name</label>
                        <input type="text"
                               name="society_name"
                               class="form-control"
                               value="{{ old('society_name') }}"
                               placeholder="Enter society name"
                               required>
                    </div>

                    {{-- Registration Number --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Registration Number</label>
                        <input type="text"
                               name="registration_no"
                               class="form-control"
                               value="{{ old('registration_no') }}"
                               placeholder="Enter registration number"
                               required>
                    </div>

                    {{-- Address --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address"
                                  class="form-control"
                                  rows="2"
                                  placeholder="Enter address"
                                  required>{{ old('address') }}</textarea>
                    </div>

                    {{-- City --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">City</label>
                        <input type="text"
                               name="city"
                               class="form-control"
                               value="{{ old('city') }}"
                               placeholder="Enter city"
                               required>
                    </div>

                    {{-- Pincode --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pincode</label>
                        <input type="text"
                               name="pincode"
                               class="form-control"
                               value="{{ old('pincode') }}"
                               placeholder="Enter pincode"
                               required>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Save Society
                    </button>
                    <a href="{{ route('admin.society.index') }}" class="btn btn-danger">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
