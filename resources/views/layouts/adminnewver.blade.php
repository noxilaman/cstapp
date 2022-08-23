


<!DOCTYPE html>
<!-- saved from url=(0037)https://childsafefriendlytourism.com/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Required meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ config('myconfig.web.title') }}</title>
  <meta name="description" content="{{ config('myconfig.web.desc') }}" />
  <meta name="keywords" content="{{ config('myconfig.web.title') }}" />
  <meta name="description" content="{{ config('myconfig.web.desc') }}" />

    <meta name="Copyright" content="{{ config('myconfig.web.copyrigth') }}" />
    <meta name="Author" content="{{ config('myconfig.web.author') }}" />


  <!-- plugins:css -->
  <link href="{{ asset('newver/css/css2')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('newver/css/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('newver/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('newver/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('newver/css/style.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('newver/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('newver/css/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('newver/css/stylefont2.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('newver/img/cst-mini.png')}}">
  <script src="{{ asset('newver/js/jquery-3.6.0.min.js')}}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Required meta tags -->
</head>
<body>
  <div class="container-scroller">

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="{{ url('/') }}"><img src="{{ asset('template2/images/cst.png') }}" class="mr-2" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img src="{{ asset('template2/images/cst-mini.png') }}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{ asset('/newver/img/facedf.png') }}" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item">
                  <i class="ti-settings text-primary"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                         <i class="ti-power-off text-primary"></i>
                  Logout
                                      </a>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                  
                </a>                 
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">ข้อมูลหลัก</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/company_types') }}">ประเภทสถานประกอบการ</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/projects') }}">โครงการ</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/companies') }}">สถานประกอบการ</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/students') }}">สมาชิก</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-course" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">ชุดข้อมูล</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-course">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/courses') }}">กลุ่มชุดการเรียน</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/lessons') }}">หัวข้อหลัก</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/sections') }}">บทเรียน</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('admin/quizs') }}">แบบทดสอบ</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                @yield('content')


                    
               </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 FOCUS. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Developed by NoXil Developer  <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- plugins:js -->
  <script src="{{ asset('newver/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
    <script src="{{ asset('newver/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ asset('newver/js/Chart.min.js')}}"></script>
  <script src="{{ asset('newver/js/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('newver/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('newver/js/dataTables.select.min.js')}}"></script>
 

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('newver/js/off-canvas.js')}}"></script>
  <script src="{{ asset('newver/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('newver/js/template.js')}}"></script>
  <script src="{{ asset('newver/js/settings.js')}}"></script>
  <script src="{{ asset('newver/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->

  <script src="{{ asset('newver/css/chart.js')}}"></script>
  <script src="{{ asset('newver/js/dashboard.js')}}"></script>
  <script src="{{ asset('newver/js/Chart.roundedBarCharts.js')}}"></script>
  




</body></html>