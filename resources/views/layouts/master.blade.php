<!doctype html>
<html class="no-js" lang="zxx">

 <head>
      
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Mini Pet World</title>
      <meta name="description" content="@yield('description')">
      <meta name="keywords" content="@yield('keywords')"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
      <!-- all css here -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/simple-line-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/meanmenu.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">

      @yield('SpecificStyles')

      
       <script type="js" src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script> 

       


   </head>
 
 

<body>
     

    @include('includes.header')

    

    @yield('content')

    @include('includes.footer')
 
 

    <!-- <a style=" position: fixed; width: 60px; height: 60px;bottom: 55px;right: 40px;border-radius: 50px;text-align: center; font-size: 30px;z-index: 100;" href="https://wa.me/03001234567" class="floaticon" target="_blank">
       <img src="{{asset('assets/img/icon-img/whts.png')}}" class="img-fluid float-right">
    </a> -->
 
    <!-- Plugins JS File --> 

       <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
       <script src="{{asset('assets/js/popper.js')}}"></script>
       <script src="{{asset('assets/js/bootstrap.min.jss')}}"></script>
       <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
       <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
       <script src="{{asset('assets/js/elevetezoom.js')}}"></script>
       <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
       <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
       <script src="{{asset('assets/js/plugins.js')}}"></script>
       <script src="{{asset('assets/js/main.js')}}"></script>

       @yield('SpecificScripts')

    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="ti-arrow-up"></i></a>
 

</body>
 
   
</html>