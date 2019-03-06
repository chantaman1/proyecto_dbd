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
		<a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Seguro de viaje
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
				<a class="dropdown-item" href="/logout">Cerrar sesión</a>
			</div>
		</li>
	@else
		<li class="nav-item">
			<a class="nav-link" href="/login">Iniciar sesión</a>
		</li>
	@endif
@endsection

@section('content')
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->

		<section class="probootstrap_section">
      <div class="container">
        <div class="row text-center mb-5 probootstrap-animate">
          <div class="col-md-12">
            <h2 class="display-4 border-bottom probootstrap-section-heading">Travel With Us</h2>
          </div>
        </div>
        <div class="row probootstrap-animate">
          <div class="col-md-12">
            <div class="owl-carousel js-owl-carousel-2">
							@foreach($seguros as $seguro)
              <div>
								<a href="asignacion_pasajero_seguro?id={{ $seguro->id }}">
                <div class="media probootstrap-media d-block align-items-stretch mb-4 probootstrap-animate">
                  <img src="assets/images/sq_img_2.jpg" alt="Free Template by ProBootstrap" class="img-fluid">
                  <div class="media-body">
                    <h5 class="mb-3">{{$seguro->tipo}}</h5>
                    <p>{{$seguro->descripcion}}</p>
										<h5>CLP$ {{number_format($seguro->precio, 0, '', '.')}}</h5>
                  </div>
                </div>
							</a>
              </div>

              <!-- END slide item -->
							@endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
