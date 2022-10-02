<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>{{ config('app.webname', '') }}</title>
  <!-- plugins:css -->

  <script type="text/javascript" id="www-widgetapi-script" src="{{ asset('newver/js/www-widgetapi.js') }}" async=""></script>
  <link href="https://fonts.googleapis.com/css2?family=Kanit" rel="stylesheet">
  <link href="{{ asset('newver/css/css2')}}?ver=20220824" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('template2/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('template2/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('template2/vendors/css/vendor.bundle.base.css') }}">

  <link rel="stylesheet" href="{{ asset('newver/css/style.css')}}?ver=20220930">

  <link rel="stylesheet" href="{{ asset('template2/vendors/mdi/css/materialdesignicons.min.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('template2/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('template2/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('template2/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('template2/stylefont2.css') }}?ver=20220824">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('template2/images/cst-mini.png') }}" />
</head>
<body>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
  @include('layouts.footerjs')
 <script src="{{ asset('js/certdemo.js?ver=1') }}"></script>
</body>

</html>

