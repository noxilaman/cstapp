
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('template2/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('template2/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('template2/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('template2/stylefont2.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('template2/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('template2/images/cst.png') }}" alt="logo">
              </div>
              <h4>เข้าสู่ระบบ</h4>
              <h6 class="font-weight-light">ใส่ username และ password เพื่อ login</h6>
              
              @yield('content')

            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('template2/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('template2/js/off-canvas.js') }}"></script>
  <script src="{{ asset('template2/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('template2/js/template.js') }}"></script>
  <script src="{{ asset('template2/js/settings.js') }}"></script>
  <script src="{{ asset('template2/js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>
