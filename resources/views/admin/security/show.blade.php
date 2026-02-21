@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Security Details</h3>
        <a href="{{ route('admin.securities.index') }}" class="btn btn-secondary">
            ← Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="row">

                {{-- Name --}}
                <div class="col-md-6 mb-3">
                    <strong>Name:</strong><br>
                    {{ $security->name }}
                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">
                    <strong>Email:</strong><br>
                    {{ $security->email }}
                </div>

                {{-- Mobile --}}
                <div class="col-md-6 mb-3">
                    <strong>Mobile:</strong><br>
                    {{ $security->mobile }}
                </div>

                {{-- Shift --}}
                <div class="col-md-6 mb-3">
                    <strong>Shift:</strong><br>
                    {{ $security->shift ?? '-' }}
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <strong>Status:</strong><br>
                    <span class="badge bg-{{ $security->status ? 'success' : 'danger' }}">
                        {{ $security->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                {{-- Photo --}}
                <div class="col-md-6 mb-3">
                    <strong>Profile Photo:</strong><br>
                    @if($security->photo)
                        <img src="{{ asset('storage/'.$security->photo) }}"
                             width="120" class="img-thumbnail mt-2">
                    @else
                        -
                    @endif
                </div>

                {{-- ID Proof --}}
                <div class="col-md-6 mb-3">
                    <strong>ID Proof:</strong><br>
                    @if($security->id_proof)
                        <a href="{{ asset('storage/'.$security->id_proof) }}"
                           target="_blank" class="btn btn-sm btn-info mt-2">
                            View ID Proof
                        </a>
                    @else
                        -
                    @endif
                </div>

                {{-- Created At --}}
                <div class="col-md-6 mb-3">
                    <strong>Created At:</strong><br>
                    {{ $security->created_at->format('d M Y') }}
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
