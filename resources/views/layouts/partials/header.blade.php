<!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
          <!--begin::Sidebar Toggle-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
                <i class="bi bi-list"></i>
              </a>
            </li>
          </ul>
          <!--end::Sidebar Toggle-->
          <!--begin::User Menu-->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img
                  src="./assets/img/user2-160x160.jpg"
                  class="rounded-circle shadow me-2"
                  style="width: 2rem; height: 2rem"
                  alt="Foto profil"
                />
                <span class="d-none d-md-inline">Nama User</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="./profile.html">
                    <i class="bi bi-person-gear me-2"></i> Update Profile
                  </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item text-danger" href="#">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <!--end::User Menu-->
        </div>
      </nav>
      <!--end::Header-->