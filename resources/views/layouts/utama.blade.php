<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIA - MSDM & Penggajian</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('SIA/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('SIA/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('SIA/vendors/css/vendor.bundle.addons.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('SIA/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('SIA/images/favicon.png') }}" />
  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
      #dt {
        text-indent: -500px;
        height: 25px;
        width: 200px;
      }
    </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ url('/') }}">
          <img src="SIA/images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
          <img src="SIA/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
          @else
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, {{ Auth::user()->name }} !</span>
              <img class="img-xs rounded-circle" src="SIA/images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <div class="container">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </div>
          </li>
          @endguest
        </ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="SIA/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Nama User</p>
                  <div>
                    <small class="designation text-muted">Jabatan</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">ABSENSI
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pegawai">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Daftar Pegawai</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="/divisi">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Divisi</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="/jabatan">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Jabatan</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="/tunjangan">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Tunjangan</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="/potongan">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Potongan</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Gaji</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
        </ul>
      </nav>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href="http://www.bootstrapdash.com/" target="_blank">Didimus Candra & Beni Mulia Tabarus</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Sistem Informasi Akuntansi
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('../../vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('../../vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('../../js/off-canvas.js') }}"></script>
  <script src="{{ asset('../../js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>