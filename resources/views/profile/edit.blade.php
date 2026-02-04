@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">My Profile</h3>

    {{-- Success message --}}
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            Profile updated successfully
        </div>
    @endif

    {{-- ================= UPDATE PROFILE INFO ================= --}}
    <div class="card mb-4">
        <div class="card-header">
            Update Profile Information
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', auth()->user()->name) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           class="form-control"
                           value="{{ auth()->user()->email }}"
                           readonly>
                </div>

                <button class="btn btn-primary">
                    Save Changes
                </button>
            </form>

        </div>
    </div>

    {{-- ================= UPDATE PASSWORD ================= --}}
    <div class="card mb-4">
        <div class="card-header">
            Change Password
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password"
                           name="current_password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-warning">
                    Update Password
                </button>
            </form>

        </div>
    </div>

    {{-- ================= DELETE ACCOUNT ================= --}}
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            Delete Account
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-danger"
                        onclick="return confirm('Are you sure? This action cannot be undone.')">
                    Delete Account
                </button>
            </form>

        </div>
    </div>

</div>

@endsection
