@extends('layouts.main')

@section('selected')
	<li class="nav-item">
		<a class="nav-link" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/hoteles">Hoteles</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/paquetes">Paquetes</a>
	</li>
	<li class="nav-item dropdown dmenu">
		<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Servicios
		</a>
		<div class="dropdown-menu sm-menu">
			<a class="dropdown-item" href="/autos">Arriendo de autos</a>
			<a class="dropdown-item" href="/seguros">Seguro de viajes</a>
		</div>
	</li>
	@if(auth()->check())
		<li class="nav-item dropdown dmenu">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Bienvenido {{ Session::get('usuario_nombre') }}
			</a>
			<div class="dropdown-menu sm-menu">
				<a class="dropdown-item" href="/buyHistory">Historial de compras</a>
				<a class="dropdown-item" href="/checkin">Check-in</a>
				@if(Session::get('usuario_rol') == 'administrador')
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/administration">Administration</a>
				@endif
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="/logout">Cerrar sesion</a>
			</div>
		</li>
	@else
		<li class="nav-item">
			<a class="nav-link active" href="/login">Iniciar sesion</a>
		</li>
	@endif
@endsection

@section('content')
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>
			<div class="container">
	    <div class="row">
				<div class="col-md-6">
		        <div class="card card-signin my-5">
		          <div class="card-body">
		            <h5 class="card-title text-center">Administrar vuelos</h5>
								<form class="form-signin" method="POST" action="{{ url('administrationAerolinea') }}">
			              <div class="form-label-group">
			                <label>Cantidad de aerolineas: {{ $aerolineas }}</label>
			              </div>
										<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Administrar aerolineas</button>
									</form>
									<form class="form-signin" method="POST" action="{{ url('administrationVuelo') }}">
									<div class="form-label-group">
		                <label>Cantidad de vuelos activos: {{ $vueloActivos }}</label>
		              </div>
									<div class="form-label-group">
										<label>Cantidad de vuelos inactivos: {{ $vueloInactivos }}</label>
		              </div>
									<div class="form-label-group">
										<label>Cantidad de asientos disponibles: {{ $asientos }}</label>
		              </div>
		              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Administrar vuelos</button>
		              <hr class="my-4">
								</form>
		          </div>
		        </div>
				</div>
				<div class="col-md-6">
					<div class="card card-signin my-5">
						<div class="card-body">
							<h5 class="card-title text-center">Administrar hoteles</h5>
							<form class="form-signin" method="POST" action="{{ url('administrationHotel') }}">
								<div class="form-label-group">
									<label>Cantidad de hoteles: {{ $hoteles }}</label>
								</div>
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Administrar hoteles</button>
							</form>
							<form class="form-signin" method="POST" action="{{ url('administrationHabitacion') }}">
								<div class="form-label-group">
									<label>Cantidad de habitaciones disponibles: {{ $habitacionesDisp }}</label>
								</div>
								<div class="form-label-group">
									<label>Cantidad de habitaciones ocupadas: {{ $habitacionesOcu }}</label>
								</div>
								<div class="form-label-group">
									<label>Cantidad total de habitaciones: {{ $totalHabitaciones }}</label>
								</div>
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Administrar habitaciones</button>
								<hr class="my-4">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
						<div class="card card-signin my-5">
							<div class="card-body">
								<h5 class="card-title text-center">Administrar automotoras</h5>
								<form class="form-signin" method="POST" action="{{ url('administrationAutomotora') }}">
									<div class="form-label-group">
										<label>cantidad automotoras: {{ $companias }}</label>
									</div>
									<div class="form-label-group">
										<label>Cantidad de vehiculos disponibles: {{ $vehiculos }}</label>
									</div>
									<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Administrar automotoras</button>
									<hr class="my-4">
								</form>
							</div>
						</div>
				</div>
				<div class="col-md-6">
					<div class="card card-signin my-5">
						<div class="card-body">
							<h5 class="card-title text-center">Administrar aseguradoras</h5>
							<form class="form-signin" method="POST" action="{{ url('administrationAseguradora') }}">
								<div class="form-label-group">
									<label>Cantidad aseguradoras: {{ $aseguradoras }}</label>
								</div>
								<div class="form-label-group">
									<label>Cantidad de seguros disponibles: {{ $seguros }}</label>
								</div>
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Administrar aseguradoras</button>
								<hr class="my-4">
							</form>
						</div>
					</div>
				</div>
	    </div>
	  </div>

    </section>
    <!-- END section -->

		<section>

	</section>


    <!-- END section -->
@endsection
