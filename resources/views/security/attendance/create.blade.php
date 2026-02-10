@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Mark Attendance</h5>
                </div>

                <div class="card-body text-center">

                    <p class="mb-3">
                        Date:
                        <strong>{{ date('d-m-Y') }}</strong>
                    </p>

                    <form method="POST"
                          action="{{ route('security.attendance.store') }}">
                        @csrf

                        <input type="hidden" name="status" value="present">

                        <button type="submit"
                                class="btn btn-success w-100">
                            ✔️ Mark Present
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
