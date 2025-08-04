<!-- Navbar -->

<nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    style="z-index: 1" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <div class="navbar-nav align-items-center">
            <div class="nav-item d-none d-md-flex align-items-center">
                <p class="fw-bold my-auto"><a href="/admin/dashboard" class="text-muted fw-light">{{ $profile->nama }}
                        /</a> @yield('title')</p>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item lh-1 me-3 d-none d-md-flex">
                {{-- time --}}
                <span id="date-day-time"></span>
            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if (Auth::user()->profile_picture == null || Auth::user()->profile_picture == '')
                            <img src="{{ asset('admin/img/favicon/favicon.ico') }}" alt="Default Profile"
                                class="w-px-40 h-auto rounded-circle" />
                        @else
                            <img src="{{ asset('uploads/users/' . Auth::user()->profile_picture) }}" alt
                                class="w-px-40 h-auto rounded-circle" />
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if (Auth::user()->profile_picture == null || Auth::user()->profile_picture == '')
                                            <img src="{{ asset('admin/img/favicon/favicon.ico') }}"
                                                alt="Default Profile" class="w-px-40 h-auto rounded-circle" />
                                        @else
                                            <img src="{{ asset('uploads/users/' . Auth::user()->profile_picture) }}"
                                                alt="{{ Auth::user()->name }}" class="w-px-40 h-auto rounded-circle"
                                                title="{{ Auth::user()->name }}" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                    <small class="text-muted text-capitalize">{{ Auth::user()->role->name }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('users.profile') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                <span class="flex-grow-1 align-middle">Billing</span>
                                <span
                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                            </span>
                        </a>
                    </li> --}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="dropdown-item" id="logoutButton">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

<!-- / Navbar -->
@push('scripts')
    <script>
        document.getElementById('logoutButton').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out of the system.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit(); // Submit the form if confirmed
                }
            });
        });


        function updateDateTime() {
            const date = new Date();
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const day = days[date.getDay()];

            const currentDate = date.toLocaleDateString('id-ID', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });


            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            const seconds = date.getSeconds().toString().padStart(2, '0');
            const time = `${hours}:${minutes}:${seconds}`;

            const dateDayTime = `${day}, ${currentDate} - ${time}`;

            document.getElementById('date-day-time').innerHTML = dateDayTime;
            document.getElementById('day').innerHTML = day;
            document.getElementById('date').innerHTML = currentDate;
            document.getElementById('time').innerHTML = time;

        }

        setInterval(updateDateTime, 1000); // Update every second
        updateDateTime(); // Initial call to display date, day, and time immediately
    </script>
@endpush
