
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Wedding Anniversary &mdash; Mr. & Mrs. Ottah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Ndubuisi & Peace Ottah" />
	<meta name="keywords" content="Ndubuisi & Peace Ottah" />
	<meta name="author" content="Ndubuisi & Peace Ottah" />


  	

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.html">Anniversary<strong>.</strong></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="active"><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('/admin/')}}">Login</a></li>
						
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Ndubuisi &amp; Peace</h1>
							<h2>A celebration of true love </h2>
							<div class="simply-countdown simply-countdown-one"></div>
							<span>
								<a href="https://www.google.com/calendar/render?action=TEMPLATE&text=20th+Anniversary+of+N+%26+P+Ottah&details=Join+us+as+we+celebrate+the+20th+anniversary+of+N+%26+P+Ottah!+Mark+your+calendar+for+April+5th,+2025,+and+don%27t+miss+this+special+event.&dates=20250405T000000Z/20250405T235900Z"
								target="_blank"
								class="btn btn-default btn-sm">
                                    📆 Save the Date
								</a>
								
							</span>
							<span>
								<a href="{{url('/guest/')}}" target="_blank" class="btn btn-success btn-sm">
    								🍽️ ️CLICK TO ORDER YOUR FOOD
								</a>
							</span>
							
							<span>
								<a href="{{url('/')}}" target="_blank" class="btn btn-success btn-sm">
    							Download Event Programme
								</a>
							</span>

						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-couple" style="margin:2px">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Welcome, friends! 🎉 Please take a look at the menu and submit your preferred meal. Enjoy your time! 😊🍽️</h2>
					        <p>
								<a href="{{url('/guest/')}}" target="_blank" class="btn btn-success btn-sm">
    								Click Here For Menu
								</a>
							</p>
					
				</div>
			</div>
		
		</div>
	</div>

	
	
    
		<div class="container">

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2025 -All Rights Reserved.</small> 
						<small class="block">Designed by <a href="#">Favour</a> </small>
					</p>
					
				</div>
			</div>

		</div>
	
	

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>

	<!-- Stellar -->
	<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('frontend/js/magnific-popup-options.js')}}"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('frontend/js/main.js')}}"></script>

	<script>
    $(document).ready(function() {
        $('.image-popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>

<script>
    var targetDate = new Date("April 5, 2025 11:00:00"); // Set countdown to April 5, 2025, 11:00 AM

    // Default example
    simplyCountdown('.simply-countdown-one', {
        year: targetDate.getFullYear(),
        month: targetDate.getMonth() + 1, // JavaScript months are 0-based
        day: targetDate.getDate(),
        hours: targetDate.getHours(),
        minutes: targetDate.getMinutes(),
        seconds: targetDate.getSeconds()
    });

    // jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: targetDate.getFullYear(),
        month: targetDate.getMonth() + 1,
        day: targetDate.getDate(),
        hours: targetDate.getHours(),
        minutes: targetDate.getMinutes(),
        seconds: targetDate.getSeconds(),
        enableUtc: false
    });
</script>


	</body>
</html>
