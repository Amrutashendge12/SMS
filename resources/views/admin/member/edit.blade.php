@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Member</h3>
        <a href="{{ route('admin.member.index') }}" class="btn btn-secondary">← Back</a>
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
                  action="{{ route('admin.member.update', $member->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Basic --}}
                    <div class="col-md-4 mb-3">
                        <label>Name</label>
                        <input type="text" name="name"
                               value="{{ $member->name }}"
                               class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Email</label>
                        <input type="email" name="email"
                               value="{{ $member->email }}"
                               class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Mobile</label>
                        <input type="text" name="mobile"
                               value="{{ $member->mobile }}"
                               class="form-control" required>
                    </div>

                    {{-- Family --}}
                    <div class="col-md-3 mb-3">
                        <label>Total Family Members</label>
                        <input type="number" name="total_family_members"
                               value="{{ $member->total_family_members }}"
                               class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Total Children</label>
                        <input type="number" name="total_children"
                               value="{{ $member->total_children }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Boys</label>
                        <input type="number" name="boys"
                               value="{{ $member->boys }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Girls</label>
                        <input type="number" name="girls"
                               value="{{ $member->girls }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Old People</label>
                        <input type="number" name="old_people"
                               value="{{ $member->old_people }}"
                               class="form-control">
                    </div>

                    {{-- Family Member Names --}}

<div class="col-md-4 mb-3">
    <label>Father Name</label>
    <input type="text" name="father_name"
           value="{{ $member->father_name }}"
           class="form-control">
</div>

<div class="col-md-4 mb-3">
    <label>Mother Name</label>
    <input type="text" name="mother_name"
           value="{{ $member->mother_name }}"
           class="form-control">
</div>

<div class="col-md-4 mb-3">
    <label>Wife Name</label>
    <input type="text" name="wife_name"
           value="{{ $member->wife_name }}"
           class="form-control">
</div>

<div class="col-md-4 mb-3">
    <label>Old People Names</label>
    <input type="text" name="old_people_name"
           value="{{ $member->old_people_name }}"
           class="form-control">
</div>

<div class="col-md-4 mb-3">
    <label>Boy Names</label>
    <input type="text" name="boy_names"
           value="{{ $member->boy_names }}"
           class="form-control">
</div>

<div class="col-md-4 mb-3">
    <label>Girl Names</label>
    <input type="text" name="girl_names"
           value="{{ $member->girl_names }}"
           class="form-control">
</div>

<div class="col-md-4 mb-3">
    <label>Guest Name</label>
    <input type="text" name="guest_name"
           value="{{ $member->guest_name }}"
           class="form-control">
</div>
                    {{-- Other --}}
                    <div class="col-md-4 mb-3">
                        <label>Occupation</label>
                        <input type="text" name="occupation"
                               value="{{ $member->occupation }}"
                               class="form-control">
                    </div>

                    <div class="col-md-8 mb-3">
                        <label>Address</label>
                        <textarea name="address"
                                  class="form-control">{{ $member->address }}</textarea>
                    </div>

                    {{-- Profile Photo --}}
                    <div class="col-md-6 mb-3">
                        <label>Profile Photo</label>
                        <input type="file" name="profile_photo"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        @if($member->profile_photo)
                            <label>Current Photo</label><br>
                            <img src="{{ asset('storage/'.$member->profile_photo) }}"
                                 width="120" class="img-thumbnail">
                        @endif
                    </div>

                </div>

                <button class="btn btn-success">Update Member</button>
                <a href="{{ route('admin.member.index') }}" class="btn btn-danger">
                    Cancel
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
