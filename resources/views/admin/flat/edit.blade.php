@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Edit Flat</h3>
        <a href="{{ route('admin.flat.index') }}" class="btn btn-secondary">← Back</a>
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

            <form method="POST" action="{{ route('admin.flat.update', $flat->id) }}">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- {{-- Wing --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Select Wing</label>
                        <select name="wing_id" class="form-select" required>
                            @foreach($wings as $wing)
                                <option value="{{ $wing->id }}"
                                    {{ $flat->wing_id == $wing->id ? 'selected' : '' }}>
                                    {{ $wing->phase->society->society_name }}
                                    → {{ $wing->phase->phase_name }}
                                    → Wing {{ $wing->wing_name }}
                                </option>
                            @endforeach
                        </select>
                    </div> -->

<div class="col-md-4 mb-3">
    <label class="form-label">Select Society</label>
    <select id="societyDropdown" class="form-select">
        <option value="">-- Select Society --</option>
        @foreach($societies as $society)
            <option value="{{ $society->id }}">
                {{ $society->society_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-md-4 mb-3">
    <label class="form-label">Select Phase</label>
    <select id="phaseDropdown" class="form-select">
        <option value="">-- Select Phase --</option>
        @foreach($phases as $phase)
            <option value="{{ $phase->id }}"
                    data-society="{{ $phase->society_id }}">
                {{ $phase->phase_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-md-4 mb-3">
    <label class="form-label">Select Wing</label>
    <select name="wing_id" id="wingDropdown" class="form-select" required>
        <option value="">-- Select Wing --</option>
        @foreach($wings as $wing)
            <option value="{{ $wing->id }}"
                    data-phase="{{ $wing->phase_id }}">
                Wing {{ $wing->wing_name }}
            </option>
        @endforeach
    </select>
</div>
                    {{-- Flat Number --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flat Number</label>
                        <input type="text" name="flat_number"
                               class="form-control"
                               value="{{ $flat->flat_number }}" required>
                    </div>

                    {{-- Floor --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Floor Number</label>
                        <input type="number" name="floor_no"
                               class="form-control"
                               value="{{ $flat->floor_no }}" required>
                    </div>

                    {{-- Flat Type --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flat Type</label>
                        <select name="flat_type" class="form-select" required>
                            @foreach(['1RK','1BHK','2BHK','3BHK'] as $type)
                                <option value="{{ $type }}"
                                    {{ $flat->flat_type == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="available" {{ $flat->status=='available'?'selected':'' }}>
                                Available
                            </option>
                            <option value="occupied" {{ $flat->status=='occupied'?'selected':'' }}>
                                Occupied
                            </option>
                        </select>
                    </div>

                </div>

                <button class="btn btn-success">Update Flat</button>
                <a href="{{ route('admin.flat.index') }}" class="btn btn-danger">Cancel</a>

            </form>

        </div>
    </div>

</div>

<script>

// Society → Phase filter
document.getElementById('societyDropdown').addEventListener('change', function() {
    let societyId = this.value;

    document.querySelectorAll('#phaseDropdown option').forEach(option => {
        if(option.value === "") return;

        option.style.display =
            option.dataset.society == societyId ? 'block' : 'none';
    });

    document.getElementById('phaseDropdown').value = "";
    document.getElementById('wingDropdown').value = "";
});


// Phase → Wing filter
document.getElementById('phaseDropdown').addEventListener('change', function() {
    let phaseId = this.value;

    document.querySelectorAll('#wingDropdown option').forEach(option => {
        if(option.value === "") return;

        option.style.display =
            option.dataset.phase == phaseId ? 'block' : 'none';
    });

    document.getElementById('wingDropdown').value = "";
});

</script>
@endsection
