@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Member Profile</h3>
        <a href="{{ route('admin.member.index') }}" class="btn btn-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-md-3 text-center">
                    @if($member->profile_photo)
                        <img src="{{ asset('storage/'.$member->profile_photo) }}"
                             class="img-thumbnail mb-2" width="150">
                    @else
                        <p class="text-muted">No Photo</p>
                    @endif
                </div>

                <div class="col-md-9">
                    <table class="table table-bordered">
                        <tr><th>Name</th><td>{{ $member->name }}</td></tr>
                        <tr><th>Email</th><td>{{ $member->email }}</td></tr>
                        <tr><th>Mobile</th><td>{{ $member->mobile }}</td></tr>
                        <tr><th>Occupation</th><td>{{ $member->occupation }}</td></tr>
                        <tr><th>Address</th><td>{{ $member->address }}</td></tr>

                        <tr>
                            <th>Total Family Members</th>
                            <td>{{ $member->total_family_members }}</td>
                        </tr>
                        <tr>
                            <th>Total Children</th>
                            <td>{{ $member->total_children }}</td>
                        </tr>
                        <tr>
                            <th>Boys</th>
                            <td>{{ $member->boys }}</td>
                        </tr>
                        <tr>
                            <th>Girls</th>
                            <td>{{ $member->girls }}</td>
                        </tr>
                        <tr>
                            <th>Old People</th>
                            <td>{{ $member->old_people }}</td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
