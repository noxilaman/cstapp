<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title>{{ config('app.webname', '') }}</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  <!-- bootstrap.min css -->

  <link rel="stylesheet" href="{{ asset('/air3/plugins/bootstrap/bootstrap.min.css') }}">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="{{ asset('/air3/plugins/Ionicons/css/ionicons.min.css') }}">
  <!-- animate.css -->
  <link rel="stylesheet" href="{{ asset('/air3/plugins/animate-css/animate.css') }}">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="{{ asset('/air3/plugins/magnific-popup/magnific-popup.css') }}">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="{{ asset('/air3/plugins/slick/slick.css') }}">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('/newver/css/style.css')}}">

<script type="text/javascript" charset="UTF-8" src="{{ asset('/newver/js/common.js') }}"></script>
<script type="text/javascript" charset="UTF-8" src="{{ asset('/newver/js/util.js') }}"></script></head>
  <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body id="body">

  <section class="coming-soon students-forgotpass text-center overly ">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            
          <h1>ลงทะเบียนเข้าร่วม Project: {{ $project->name }}</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="about section">
	<div class="container">
      <div class="row">
        <div class="col-8">@yield('content')</div>
			

      </div>
		</div> 
</section>

    <!-- 
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('air3/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('air3/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- slick Carousel -->
    <script src="{{ asset('air3/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('air3/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('air3/plugins/shuffle/shuffle.min.js') }}"></script>
    <script src="{{ asset('air3/plugins/SyoTimer/jquery.syotimer.min.js') }}"></script>

    <!-- Form Validator -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="{{ asset('air3/plugins/google-map/map.js') }}"></script>

    <script src="{{ asset('air3/js/script.js') }}"></script>
    <script>
   function onSubmit(token) {
     document.getElementById("regiterstudentfrm").submit();
   }
 </script>
    </body>

    </html>