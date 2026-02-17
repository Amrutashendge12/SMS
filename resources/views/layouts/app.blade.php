<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ ucfirst(auth()->user()->role) }} Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Admin Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="bg-light">

{{-- ================= TOP NAVBAR ================= --}}
<nav class="navbar navbar-dark bg-dark px-3">
    <button class="btn btn-outline-light d-md-none me-2"
        onclick="toggleSidebar()">
        ☰
    </button>

    <span class="navbar-brand">Society Management System</span>

    {{-- Admin Dropdown --}}
    <div class="dropdown">
        <a class="text-white dropdown-toggle text-decoration-none"
           href="#"
           role="button"
           data-bs-toggle="dropdown">
            {{ auth()->user()->name }} ({{ auth()->user()->role }})
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    ✏️ Edit Profile
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="button"
                            class="dropdown-item text-danger"
                            onclick="confirmLogout()">
                            🚪 Logout
                        </button>
                    </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        {{-- ================= SIDEBAR ================= --}}
        <div id="sidebar"class="col-md-2 sidebar text-white min-vh-100 p-3">

            <button class="btn btn-sm btn-light d-md-none mb-3"
                onclick="toggleSidebar()">
                ✖ Close
            </button>

            @if(auth()->user()->role === 'admin')
                <strong>Admin</strong>
                <hr class="text-secondary">

                <a href="{{ route('admin.dashboard') }}" class="fw-bold mb-2">
                    Dashboard
                </a>

                <details class="mb-2">
                    <summary>Society</summary>
                    <a href="{{ route('admin.society.index') }}">View Society</a>
                    <a href="{{ route('admin.society.create') }}">+ Add Society</a>
                </details>

                <details class="mb-2">
                    <summary>Phase</summary>
                    <a href="{{ route('admin.phase.index') }}">View Phase</a>
                    <a href="{{ route('admin.phase.create') }}">+ Add Phase</a>
                </details>

                <details class="mb-2">
                    <summary>Wing</summary>
                    <a href="{{ route('admin.wing.index') }}">View Wing</a>
                    <a href="{{ route('admin.wing.create') }}">+ Add Wing</a>
                </details>

                <details class="mb-2">
                    <summary>Flat</summary>
                    <a href="{{ route('admin.flat.index') }}">View Flat</a>
                    <a href="{{ route('admin.flat.create') }}">+ Add Flat</a>
                </details>

                <details class="mb-2">
                    <summary>Owner</summary>
                    <a href="{{ route('admin.member.index') }}">View Owners</a>
                    <a href="{{ route('admin.member.create') }}">+ Add Owner</a>
                </details>

                <details class="mb-2 sidebar-details">
                    <summary class="sidebar-summary">🛡️ Security</summary>
                    <div class="sidebar-submenu">
                        <a href="{{ route('admin.securities.index') }}" class="sidebar-link">View Security</a>
                        <a href="{{ route('admin.securities.create') }}" class="sidebar-link"> + Add Security</a>
                    </div>
                </details>


            @endif

            @if(auth()->user()->role === 'owner')
                 <strong>Owner</strong>

                <hr class="text-secondary">
                 <a href="{{ route('owner.dashboard') }}" class="fw-bold mb-2">
                    Dashboard
                </a>

                 <details class="mb-2">
                    <summary>Society</summary>
                    <a href="{{ route('owner.societies.index') }}">View Societies</a>
                </details>

                <details class="mb-2">
                    <summary>Phase</summary>
                        <a href="{{ route('owner.phases.index') }}">View Phases</a>
                </details>

                <details class="mb-2">
                    <summary>Wing</summary>
                        <a href="{{ route('owner.wings.index') }}">View Wings</a>
                </details>

                <details class="mb-2">
                    <summary>Flat</summary>
                    <a href="{{ route('owner.flats.index') }}">View Flats</a>
                </details>

    
                <details class="mb-2 sidebar-details">
                    <summary class="sidebar-summary">Security</summary>
                        <div class="sidebar-submenu">
                            <a href="{{ route('owner.securities.index') }}" class="sidebar-link">View Security</a>
                        </div>
                </details>
            @endif

@if(auth()->user()->role === 'security')

    <strong>Security Panel</strong>
    <hr class="text-secondary">

    {{-- Dashboard --}}
    <a href="{{ route('security.dashboard') }}" class="fw-bold mb-2 d-block">
        Dashboard
    </a>

    {{-- Attendance --}}
    <details class="mb-2">
        <summary>Attendance</summary>
        <a href="{{ route('security.attendance.index') }}">View Attendance</a>
        <a href="{{ route('security.attendance.create') }}">+ Mark Attendance</a>
    </details>

    {{-- View Data --}}
    <details class="mb-2">
        <summary>Society</summary>
        <a href="{{ route('security.societies.index') }}">View Societies</a>
    </details>

    <details class="mb-2">
        <summary>Phase</summary>
        <a href="{{ route('security.phases.index') }}">View Phases</a>
    </details>

    <details class="mb-2">
        <summary>Wing</summary>
        <a href="{{ route('security.wings.index') }}">View Wings</a>
    </details>

    <details class="mb-2">
        <summary>Flat</summary>
        <a href="{{ route('security.flats.index') }}">View Flats</a>
    </details>

    <details class="mb-2">
        <summary>Owner</summary>
        <a href="{{ route('security.owners.index') }}">View Owners</a>
    </details>

    {{-- Profile --}}
    <details class="mb-2">
        <summary>My Profile</summary>
        <a href="{{ route('profile.edit') }}">Edit Profile</a>
    </details>

@endif

<details class="mb-2">
    <summary>Events</summary>

    {{-- Admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.events.index') }}">View Events</a>
        <a href="{{ route('admin.events.create') }}">+ Add Event</a>

    {{-- Owner --}}
    @elseif(auth()->user()->role === 'owner')
        <a href="{{ route('owner.events.index') }}">View Events</a>
        <a href="{{ route('owner.events.create') }}">+ Add Event</a>

    {{-- Security --}}
    @elseif(auth()->user()->role === 'security')
        <a href="{{ route('security.events.index') }}">View Events</a>
    @endif
</details>

<details class="mb-2">
    <summary>Maintenances</summary>

    {{-- Admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.maintenance.index') }}">View Maintenances</a>

    {{-- Owner --}}
    @elseif(auth()->user()->role === 'owner')
        <a href="{{ route('owner.maintenance.index') }}">View Maintenances</a>
        <a href="{{ route('owner.maintenance.create') }}">+ Add Maintenance</a>

    {{-- Security --}}
    @elseif(auth()->user()->role === 'security')
        <a href="{{ route('security.maintenance.index') }}">View Maintenances</a>
    @endif
</details>

<details class="mb-2">
    <summary>Notices</summary>

    {{-- Admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.notices.index') }}">View Notices</a>
        <a href="{{ route('admin.notices.create') }}">+ Add Notice</a>

    {{-- Owner --}}
    @elseif(auth()->user()->role === 'owner')
        <a href="{{ route('owner.notices.index') }}">View Notices</a>

    {{-- Security --}}
    @elseif(auth()->user()->role === 'security')
        <a href="{{ route('security.notices.index') }}">View Notices</a>
    @endif

</details>

<details class="mb-2">
    <summary>Visitors</summary>

    {{-- Admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.visitors.index') }}">View Visitors</a>

    {{-- Owner --}}
    @elseif(auth()->user()->role === 'owner')
        <a href="{{ route('owner.visitors.index') }}">View Visitors</a>

    {{-- Security --}}
    @elseif(auth()->user()->role === 'security')
        <a href="{{ route('security.visitors.index') }}">View Visitors</a>
        <a href="{{ route('security.visitors.create') }}">+ Add Visitor</a>
    @endif

</details>

<details class="mb-2">
    <summary>Amenities</summary>

    {{-- Admin --}}
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.amenities.index') }}">View Amenities</a>
        <a href="{{ route('admin.amenities.create') }}">+ Add Amenity</a>
        <a href="{{ route('admin.bookings.pending') }}">Pending Requests</a>
        <a href="{{ route('admin.bookings.approved') }}">Approved Bookings</a>
        <a href="{{ route('admin.bookings.rejected') }}">Rejected Bookings</a>

    {{-- Owner --}}
    @elseif(auth()->user()->role === 'owner')
        <a href="{{ route('owner.amenities.index') }}">View Amenities</a>
        <a href="{{ route('owner.amenities.my') }}">My Bookings</a>

    {{-- Security --}}
    @elseif(auth()->user()->role === 'security')
        <a href="{{ route('security.amenities.index') }}"> View Amenities</a>
    @endif

</details>

<details class="mb-2">
    <summary>Parking</summary>

    {{-- ADMIN --}}
    @if(auth()->user()->role === 'admin')

        <a href="{{ route('admin.parkings.index') }}">View Parking</a>
        <a href="{{ route('admin.parkings.create') }}">+ Add Parking</a>


    {{-- OWNER --}}
    @elseif(auth()->user()->role === 'owner')

        <a href="{{ route('owner.parkings.index') }}">View Parking</a>


    {{-- SECURITY --}}
    @elseif(auth()->user()->role === 'security')

        <a href="{{ route('security.parkings.index') }}">View Parking</a>
        <a href="{{ route('security.parkings.create') }}">+ Vehicle Entry</a>

    @endif

</details>

{{-- Bills Menu --}}
@if(auth()->user()->role === 'admin' || auth()->user()->role === 'owner')

<details class="mb-2">
    <summary>Bills</summary>

    {{-- ADMIN --}}
    @if(auth()->user()->role === 'admin')

        <a href="{{ route('admin.bills.index') }}">View Bills</a>
        <br>
        <a href="{{ route('admin.bills.create') }}">+ Add Bill</a>

    {{-- OWNER --}}
    @elseif(auth()->user()->role === 'owner')

        <a href="{{ route('owner.bills.index') }}">My Bills</a>

    @endif

</details>

@endif



</div>

        {{-- ================= MAIN CONTENT ================= --}}
        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>

{{-- Bootstrap JS (Dropdown required) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Logout',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar')
                .classList.toggle('active');
    }
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>


@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This owner will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{{ session('success') }}",
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif

</body>
</html>
