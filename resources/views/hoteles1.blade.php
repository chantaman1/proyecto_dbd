<!DOCTYPE html>
<html lang="en">
	<head>
      <!--
    More Templates Visit ==> ProBootstrap.com
    Free Template by ProBootstrap.com under the License Creative Commons 3.0 ==> (probootstrap.com/license)

    IMPORTANT: You can do whatever you want with this template but you need to keep the footer link back to ProBootstrap.com
    -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Places &mdash; Free HTML5 Bootstrap 4 Theme by ProBootstrap.com</title>
		<meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
		<meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/select2.css">


    <link rel="stylesheet" href="assets/css/helpers.css">
    <link rel="stylesheet" href="assets/css/style.css">

	</head>
	<body>


		<nav class="navbar navbar-expand-lg navbar-dark probootstrap_navbar" id="probootstrap-navbar">
      <div class="container">
        <a class="navbar-brand" href="/">PLACES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-menu" aria-controls="probootstrap-menu" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="ion-navicon"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="probootstrap-menu">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="/vuelos1">Vuelos</a></li>
            <li class="nav-item active"><a class="nav-link" href="/hoteles1">Hoteles</a></li>
            <li class="nav-item"><a class="nav-link" href="/paquetes1">Paquetes</a></li>
            <li class="nav-item"><a class="nav-link" href="/autos1">Autos</a></li>
            <li class="nav-item"><a class="nav-link" href="/login1">Iniciar Sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->


		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->

    <section class="probootstrap_section" id="section-city-guides">
			<div class="container">
        <div class="row align-items-center">

          <div class="col-md probootstrap-animate">
            <form action="#" class="probootstrap-form">
              <div class="form-group">
                <div class="row mb-3">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="id_label_single">Ciudad</label>

                      <label for="id_label_single" style="width: 100%;">
                        <select class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
													<option></option>
                          <option value="Cancún">Cancún</option>
                          <option value="Punta Cana">Punta Cana</option>
                          <option value="Playa del Carmen">Playa del Carmen</option>
                          <option value="Camboriú">Camboriú</option>
                          <option value="Río de Janeiro">Río de Janeiro</option>
                          <option value="Búzios">Búzios</option>
                          <option value="Buenos Aires">Buenos Aires</option>
                          <option value="Bariloche">Bariloche</option>
													<option value="Mendoza">Mendoza</option>
													<option value="Nueva York">Nueva York</option>
													<option value="Los Ángeles">Los Ángeles</option>
													<option value="Miami">Miami</option>
													<option value="Santiago">Santiago</option>
													<option value="Puerto Varas">Puerto Varas</option>
                          <option value="Pucón">Pucón</option>
                          <option value="Puerto Natales">Puerto Natales</option>
                        </select>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- END row -->
                <div class="row mb-5">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="probootstrap-date-departure">Fecha de check-in</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input type="text" id="probootstrap-date-departure" class="form-control" placeHolder={{ date('d/m/Y') }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="probootstrap-date-arrival">Fecha de check-out</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input type="text" id="probootstrap-date-arrival" class="form-control" placeHolder={{ "Check-out" }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                </div>

								<div class="row mb-5">
                  <div class="col-md">
                    <div class="form-group">
											<select class="js-example-basic-single" style="width: 100%;">
												<option>1 adulto</option>
												<option selected>2 adultos</option>
												<option>3 adultos</option>
											</select>
                    </div>
                  </div>
									<div class="col-md">
                    <div class="form-group">
											<select class="js-example-basic-single" style="width: 100%;">
												<option>Sin niños</option>
												<option>1 niño</option>
												<option>2 niños</option>
											</select>
                    </div>
                  </div>
                </div>

                <!-- END row -->
                <div class="row">
									<div class="col-md">
										</div>
									<div class="col-md">
                    <input type="submit" value="Busca tu hotel" class="btn btn-primary btn-block">
                  </div>
                </div>
              </div>
            </form>
          </div>

					<div class="col-md">
            <h2 class="heading mb-2 display-4 font-light probootstrap-animate">RESERVA TU HOTEL	</h2>
            <p class="lead mb-5 probootstrap-animate">


            </p>
            </p>
          </div>

        </div>
      </div>
    </section>

    <!-- END section -->

    <footer class="probootstrap_section probootstrap-border-top">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <h3 class="probootstrap_font-18 mb-3">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="https://free-template.co" target="_blank">Home</a></li>
              <li><a href="https://free-template.co" target="_blank">About</a></li>
              <li><a href="https://free-template.co" target="_blank">Services</a></li>
              <li><a href="https://free-template.co" target="_blank">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="probootstrap_font-18 mb-3">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="https://free-template.co" target="_blank">Home</a></li>
              <li><a href="https://free-template.co" target="_blank">About</a></li>
              <li><a href="https://free-template.co" target="_blank">Services</a></li>
              <li><a href="https://free-template.co" target="_blank">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="probootstrap_font-18 mb-3">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="https://free-template.co" target="_blank">Home</a></li>
              <li><a href="https://free-template.co" target="_blank">About</a></li>
              <li><a href="https://free-template.co" target="_blank">Services</a></li>
              <li><a href="https://free-template.co" target="_blank">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h3 class="probootstrap_font-18 mb-3">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="https://free-template.co" target="_blank">Home</a></li>
              <li><a href="https://free-template.co" target="_blank">About</a></li>
              <li><a href="https://free-template.co" target="_blank">Services</a></li>
              <li><a href="https://free-template.co" target="_blank">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-12 text-center">
            <p class="probootstrap_font-14">&copy; 2017. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://probootstrap.com/" target="_blank">ProBootstrap</a><small> (Don't remove credit link on this footer. See <a href="https://probootstrap.com/license/">license</a>)</small></p>
            <p class="probootstrap_font-14">Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
          </div>
        </div>
      </div>
    </footer>


    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

		<script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>

    <script src="assets/js/select2.min.js"></script>

    <script src="assets/js/main.js"></script>
	</body>
</html>
