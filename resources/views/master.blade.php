 <!DOCTYPE html>
<html>
<head>
<title>Cardic Instruments - @yield('title')</title>
<!--/tags -->

<link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
<link href="{{asset('css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
<link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href=" {{asset('css/bootstrap-dropdown-hover.css')}}" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen" />


<!-- <link href="css/catbanner.css" rel='stylesheet' type='text/css'/> -->
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<style>
    .scrollable-menu {
    height: auto;
    max-height: 250px;
    overflow-x: hidden;
}
</style>
</head>
<body>
<!-- header -->
@include('includes.header')
<!-- //header -->


            @yield('content')
      

@include('includes.footer')
     <div class="modal fade" id="cartdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
						    <h4>Your Cart !</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
						</div>
						<div class="modal-body modal-spa" >
						    <div class="bs-docs-example">
			 @if(Cart::count() > 0  )       
				<table class="table table-striped">
					<thead>
						<tr>
						    <th>Code</th>
							<th>Product Name</th>
							<th>Size</th>
							<th>Qty</th>
						</tr>
					</thead>
					
					@foreach(Cart::content() as $prod)
						<tr>
						    <td>{{$prod->id}}</td>
							<td>{{$prod->name}}</td>
							<td>{{$prod->options->size}}</td>
							<td>{{$prod->qty}}</td>
						</tr>
					@endforeach
				</table>
				 <a class="hvr-outline-out button2" href="{{route('cart')}}" style="padding:10px 10px;color:white">Check Out</a>
				 @else
				 <h3>Your Cart is Empty</h3>
				 @endif
						</div>
					</div>
				</div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

    $("#getcart").click(function () {
        console.log("showmodal");
        // $('<div style="color:black"> Data </div>').appendTo('#showcart');
        // $("#cartdata").modal('show');
        var ajaxurl = '{{route('get_cart_data')}}';
        $('#showcart').empty();
        $("#cartdata").modal('show');
//         $.ajax({
//         url: ajaxurl,
//         type: "GET",
//         success: function(data){
//             $data = $(data); 
//             console.log(data);
            
//             if(data){
//              for (var key in data) {
//              if (data.hasOwnProperty(key)) {
//             $('<tr style="color:black"><td>'+data[key]["name"]+'</td>'+data[key].options[0].size+'<td>'+data[key]["qty"]+'</td></tr>').appendTo('#showcart');
//             }}
//             }
//             else{
//                 $('<h3>Your Cart is empty</h3>').appendTo('#showcart');;
//             }
             
        
   
//  }});
 });
});
</script>




<!--<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>-->

<!-- js -->
<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<script src="{{asset('js/modernizr.custom.js')}} "></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="{{asset('js/minicart.min.js')}}"></script>
	<!-- for bootstrap working -->
 <script  type="text/javascript" src="{{asset('js/bootstrap-dropdownhover.min.js')}}"></script>
<!--<script type="text/javascript" src="{{asset('js/bootstrap.js')}} "></script>-->


<script type="text/javascript">
  var onloadCallback = function() {
    // alert("grecaptcha is ready!");
  };
</script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
 <script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script> 

	<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="{{asset('js/easy-responsive-tabs.js')}}"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('js/jquery.countup.js')}}"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.easing.min.js')}}"></script>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("menu__item");
console.log(btns);
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active menu__item--current", "");
  this.className += " active";
  });
}
</script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
		<!-- single -->
<script src="{{asset('js/imagezoom.js')}}"></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src="{{asset('js/easy-responsive-tabs.js')}}"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="{{asset('js/jquery.flexslider.js')}}"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
// 			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			var nav = $('.header-bot');
            if (nav.length) {
              var contentNav = nav.offset().top;
                        }
			console.log("clicked");
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
		    
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>


<!-- //here ends scrolling icon -->


<!--<a href="#" id="toTop">To Top</a>-->
    
    
</body>
</html>
