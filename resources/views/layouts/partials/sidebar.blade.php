<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand">
          <a href="./index.html" class="brand-link">
            <img src="./assets/img/AdminLTELogo.png" alt="Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Master Praktikum</span>
          </a>
        </div>
        <div class="sidebar-wrapper">
          <nav class="mt-2" aria-label="Main navigation">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" id="navigation">
              <!-- Menu Dashboard -->
              <li class="nav-item">
                  <a href="{{ url('/') }}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                  </a>
              </li>

              <!-- Menu Data Poli -->
              <li class="nav-item">
                  <a href="{{ route('poli.index') }}" class="nav-link {{ request()->routeIs('poli.*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-hospital"></i>
                      <p>Data Poli</p>
                  </a>
              </li>

              <!-- Menu Data Dokter -->
              <li class="nav-item">
                  <a href="{{ route('dokter.index') }}" class="nav-link {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-user-md"></i>
                      <p>Data Dokter</p>
                  </a>
              </li>

              <!-- Menu Data Pasien -->
              <li class="nav-item">
                  <a href="{{ route('pasien.index') }}" class="nav-link {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-users"></i>
                      <p>Data Pasien</p>
                  </a>
              </li>

              <!-- Menu Pendaftaran -->
              <li class="nav-item">
                  <a href="{{ route('pendaftaran.index') }}" class="nav-link {{ request()->routeIs('pendaftaran.*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-clipboard-list"></i>
                      <p>Pendaftaran</p>
                  </a>
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!--end::Sidebar-->