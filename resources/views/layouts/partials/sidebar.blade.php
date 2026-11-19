<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Master Praktikum</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Main navigation">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" id="navigation">
                @auth
                    {{-- Menu untuk semua role --}}
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Menu khusus Admin --}}
                    @if (Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>Manajemen User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('poli.index') }}" class="nav-link {{ request()->routeIs('poli.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-hospital"></i>
                                <p>Data Poli</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dokter.index') }}" class="nav-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>Data Dokter</p>
                            </a>
                        </li>
                    @endif

                    {{-- Menu untuk Admin & Petugas Pendaftaran --}}
                    @if (in_array(Auth::user()->role, ['admin', 'registration']))
                        <li class="nav-item">
                            <a href="{{ route('pasien.index') }}" class="nav-link {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pendaftaran.index') }}" class="nav-link {{ request()->routeIs('pendaftaran.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Pendaftaran</p>
                            </a>
                        </li>
                    @endif

                    {{-- Menu untuk Admin & Dokter --}}
                    @if (in_array(Auth::user()->role, ['admin', 'doctor']))
                        <li class="nav-item">
                            <a href="{{ route('jadwal.index') }}" class="nav-link {{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Jadwal Praktik</p>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </div>
</aside>
<!--end::Sidebar-->