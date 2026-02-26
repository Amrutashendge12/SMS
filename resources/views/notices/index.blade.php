@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Society Notices</h3>

    {{-- Admin only Add Button --}}
    @if(auth()->user()->role == 'admin')
        <a href="{{ route('admin.notices.create') }}" class="btn btn-primary mb-3">
            Add Notice
        </a>
    @endif

<table class="table table-bordered datatable">

    <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Date</th>
                <th>Action</th>

            </tr>
        </thead>

        <tbody>
        @foreach($notices as $notice)
            <tr>
                <td>{{ $notice->title }}</td>
                <td>{{ $notice->notice_type }}</td>
                <td>{{ $notice->notice_date }}</td>
                <td>
                    
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.notices.edit',$notice->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.notices.destroy',$notice->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection
