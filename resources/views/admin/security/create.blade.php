@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Add Security</h3>
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
                  action="{{ route('admin.securities.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">

                    {{-- Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Security Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               required>
                    </div>

                    {{-- Mobile --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text"
                               name="mobile"
                               class="form-control"
                               value="{{ old('mobile') }}"
                               required>
                    </div>

                    {{-- Shift --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Shift</label>
                        <select name="shift" class="form-select">
                            <option value="">-- Select Shift --</option>
                            <option value="Day">Day</option>
                            <option value="Night">Night</option>
                        </select>
                    </div>

                    {{-- Password --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>

                    {{-- Photo --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Profile Photo</label>
                        <input type="file"
                               name="photo"
                               class="form-control">
                    </div>

                    {{-- ID Proof --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">ID Proof</label>
                        <input type="file"
                               name="id_proof"
                               class="form-control">
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Save Security
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
