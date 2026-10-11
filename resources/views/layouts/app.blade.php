<!doctype html>
<html lang="id" data-bs-theme="light" data-lte-color-mode="off">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Master Praktikum | Dashboard</title>

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Bootstrap Icons-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Bootstrap Icons-->
    <!--begin::AdminLTE-->
   <link rel="stylesheet" href="{{ asset('adminLTE/css/adminlte.min.css') }}">
    <!--end::AdminLTE-->
  </head>
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      @include('layouts.partials.header')
      @include('layouts.partials.sidebar')
      <!--begin::App Main-->
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <!-- Ubah H1 ini menjadi dinamis menggunakan yield -->
            <h1 class="mb-0 fs-3">@yield('title')</h1> 
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <!-- HAPUS card "Selamat datang..." dan GANTI dengan yield content -->
            @yield('content')
          </div>
        </div>
      </main>
      <!--end::App Main-->
          </div>
        </div>
      </main>
      <!--end::App Main-->
    </div>

    <!--begin::Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('adminLTE/js/adminlte.min.js') }}"></script>
    <!--end::Scripts-->
  </body>
</html>
