<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>User / Client List - Nucleus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Nucleus</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('home')}}">
          <i class="bi bi-envelope"></i>
          <span>Clients</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('accounts.index')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Account List</span>
        </a>
      </li>

      

    </ul>

  </aside><!-- End Sidebar-->
  @yield('content')
<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Nucleus</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://prometteursolutions.com/" target="_blank">Prometteur Solution Pvt. Ltd</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- ==== Add and Update Clients Modal Popup ==== -->
  <div class="modal fade" id="addClientsCentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Clients</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3 needs-validation" novalidate action="{{ url('adduser') }}" method="post">
           @csrf
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Company name</label>
              <input type="text" name="company_name" class="form-control" id="validationCustom01" required>
              <div class="invalid-feedback">Please provide company name</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">User name</label>
              <input type="text" class="form-control"  name="name" id="validationCustom02" required>
              <div class="invalid-feedback">Please provide user name!</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustomUsername" class="form-label">Business Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please provide Email!.
                </div>
              </div>
            </div>
            {{-- <div class="col-md-6">
              <label for="validationCustom04" class="form-label">Status</label>
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>Pending</option>
                <option>Approved</option>
                <option>Rejected</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Status.
              </div>
            </div> --}}
            <div class="col-12">
              <input class="btn btn-primary" type="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>





<!-- ==== Delete Modal Popup ==== -->
  {{-- <div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <h4 class="mb-4">Are you sure?</h4>
          <p>Do you really want to delete this records? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger">Yes</button>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('jquery')
</body>


</html>
