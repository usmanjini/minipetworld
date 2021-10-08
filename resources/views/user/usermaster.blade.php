<!DOCTYPE html>

<html>
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Pet World -  @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/bootstrap.css')}}"> 
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/iconly/bold.css')}}"> 
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/app.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    
    <!-- For sorting effect -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    @yield('SpecificStyles')

</head>

 
<body>

<!-- header -->

@include('user.includes.header')

<!-- //header -->

<div class="banner-bootom-w3-agileits">

	   @include('user.includes.sidemenu') 

		 
         <div id="main">

			@yield('content')

            @include('user.includes.footer')

		 </div>	
         

</div> 
	<script src="{{ asset('assets/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }} "></script>
    <script src="{{ asset('assets/admin/assets/js/bootstrap.bundle.min.js') }}"></script>   
    <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
	@yield('specificscripts')

</body>

</html>

