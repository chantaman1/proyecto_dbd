<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Vuelos</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="booking/css/booking.css">
		<link rel="stylesheet" href="css/camera.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>
		<!--[if (gt IE 9)|!(IE)]><!-->
		<script src="js/jquery.mobile.customized.min.js"></script>
		<!--<![endif]-->
		<script src="booking/js/booking.js"></script>
		<script>
			$(document).ready(function(){
			jQuery('#camera_wrap').camera({
				loader: false,
				pagination: false ,
				minHeight: '444',
				thumbnails: false,
				height: '48.375%',
				caption: true,
				navigation: true,
				fx: 'mosaic'
			});
			/*carousel*/
			var owl=$("#owl");
				owl.owlCarousel({
				items : 2, //10 items above 1000px browser width
				itemsDesktop : [995,2], //5 items between 1000px and 901px
				itemsDesktopSmall : [767, 2], // betweem 900px and 601px
				itemsTablet: [700, 2], //2 items between 600 and 0
				itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
				navigation : true,
				pagination : false
				});
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->
	</head>
	<body class="page1" id="top">
<!--==============================header=================================-->
<header>
	<div class="container_12">
		<div class="grid_12">
			<div class="menu_block">
				<nav class="horizontal-nav full-width horizontalNav-notprocessed">
					<ul class="sf-menu">
						<li><a href="/vuelos"><br/>VUELOS</a></li>
						<li><a href="/hoteles"><br/>HOTELES</a></li>
						<li><a href="/paquetes"><br/>PAQUETES</a></li>
						<li><a href="/vehiculos"><br/>AUTOS</a></li>
						@if(Auth::check())
							<li><a href="/login/destroy">CERRAR SESIÓN<br/>{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }}</a></li>
						@else
							<li><a href="/login"><br/>INICIAR SESIÓN</a></li>
						@endif
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
		<div class="grid_12">
			<h1>
				<a href="/paquetes">
					<img src="images/logo.png">
				</a>
			</h1>
		</div>
	</div>
</header>
<div class="slider_wrapper">
	<div id="camera_wrap" class="">
		<div data-src="images/miamislide1.jpg">
			<div class="caption fadeIn">
				<h2>MIAMI</h2>
				<div class="price">
					DESDE
					<span>$879.106</span>
				</div>
			</div>
		</div>
		<div data-src="images/cancunslide1.jpg">
			<div class="caption fadeIn">
				<h2>CANCÚN</h2>
				<div class="price">
					DESDE
					<span>$649.230</span>
				</div>
			</div>
		</div>
		<div data-src="images/riodejaneiroslide1.jpg">
			<div class="caption fadeIn">
				<h2>RÍO DE JANEIRO</h2>
				<div class="price">
					DESDE
					<span>$492.075</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Iniciar sesion</h3>
					<form id="bookingForm" method="POST" action="{{ url('login/doLogin') }}">
						<div class="fl1">
							<div class="tmInput">
								<input name="email" id="email" placeHolder="Correo..." type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="password" id="password" placeHolder="Password..." type="password" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<h1 style="color:red;">{{ $message }}</h1>
						<a href="javascript:;" onclick="parentNode.submit();" class="btn" id="submitBtnLogin" type="submit">Iniciar sesion!</a>
					</form>
          <div class="clear"></div>
          <div class="col-md-8 col-md-offset-4">
            <a href="{{url('/auth/facebook')}}"><img src="images/fbBtn.png" width="350" height="117" /></a>
          </div>
				</div>
        <div class="grid_5 prefix_1">
          <h3>Registrar usuario</h3>
          <div class="clear"></div>
          <form id="bookingForm" method="GET" action="{{ url('register') }}">
            <a href="javascript:;" onclick="parentNode.submit();" class="btn" id="goBtnRegister" type="submit">Ir a registro</a>
          </form>
        </div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy">
						Your Trip 2019 | <a href="#">Privacy Policy</a> | Website Template Designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
					</div>
				</div>
			</div>
		</footer>
		<script>
			$(function (){
				$('#bookingForm').bookingForm({
					ownerEmail: '#'
				});
			})
			$(function() {
				$('#bookingForm input, #bookingForm textarea').placeholder();
			});
		</script>
	</body>
</html>
