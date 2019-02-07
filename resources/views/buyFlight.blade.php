<!DOCTYPE html>
<html lang="en">
	<head>
		<title>About</title>
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
		<script src="assets/js/jquery.payform.min.js" charset="utf-8"></script>
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
      <h3>Resumen de pago</h3>
			@foreach ($data as $dt)
        <div class="grid_4">
          <a class="btn"> <strong>Pasajero:</strong> {{$dt->nombre}} <br/> <strong>Numero de asiento:</strong> {{$dt->codigo}} <br/> <strong>Tipo de asiento:</strong> {{$dt->tipo}} <br/> <strong>Precio:</strong> ${{$dt->precio}} <br/> <strong>Ciudad origen:</strong> {{$dt->origen}} <br/> <strong>Ciudad destino:</strong> {{$dt->destino}} </a>
        </div>
			@endforeach
				<div class="grid_4">
					<a class="btn"> <strong>Total a pagar:</strong> {{$total}} </a>
				</div>
      <div class="clear"></div>
    </div>
		<div class="grid_6">
			<h3>Datos tarjeta de credito</h3>
			<form id="bookingForm" action="{{ url('finalizar') }}">
				<div class="fl1">
					<div class="tmInput">
						<input id="owner" name="nombre" placeHolder="Nombre tarjeta..." type="text" data-constraints='@NotEmpty @Required'>
					</div>
					<div class="tmInput">
						<input id="cardNumber" name="numero" placeHolder="Numero de tarjeta..." type="text" data-constraints="@NotEmpty @Required">
					</div>
					<div class="fl1 fl2">
						<em>Mes</em>
						<select name="mes" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
						<div class="clear"></div>
						<em>Año</em>
						<select name="ano" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
						</select>
					</div>
					<div class="tmInput">
						<input id="cvv" name="cvv" placeHolder="CVV..." type="text" data-constraints="@NotEmpty @Required">
					</div>
				</div>
				<div class="clear"></div>
				<a href="javascript:;" onclick="parentNode.submit();" id="confirmButton" class="btn" type="submit">Realizar pago</a>
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
