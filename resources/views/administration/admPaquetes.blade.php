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
				<div class="col-md-6 col-centered">
		        <div class="card card-signin my-5">
		          <div class="card-body">
		            <h5 class="card-title text-center">Administrar paquetes</h5>
								<form class="form-signin" method="POST" action="{{ url('administrationPaqueteDisable') }}">
									<div class="form-group">
										<label for="id_label_single">Paquetes existentes</label>
										<label for="id_label_single" style="width: 100%;">
											<select name="paqueteId" class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
												@foreach($paquetes as $paquete)
                          @if($paquete->disponibilidad)
													   <option value="{{ $paquete->id }}">Destino:{{ $paquete->pais_destino }} Precio:{{ $paquete->precio }} Cupo:{{ $paquete->cupos }} STATUS: Disponible</option>
                          @else
                             <option value="{{ $paquete->id }}">Destino:{{ $paquete->pais_destino }} Precio:{{ $paquete->precio }} Cupo:{{ $paquete->cupos }} STATUS: No disponible</option>
                          @endif
                        @endforeach
											</select>
										</label>
										<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Activar/desactivar paquete</button>
			              <hr class="my-4">
									</div>
								</form>
								<form class="form-signin" method="POST" action="{{ url('administrationPaqueteAdd') }}">
									<div class="form-label-group">
										<input name="aerolinea" type="name" id="inputName" class="form-control" placeholder="Airline name" required autofocus>
										<label>Agregue nueva aerolinea</label>
									</div>
									<div class="form-label-group">
										<b style="color:red;">{{ $regErr }}</b>
									</div>
		              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Agregar aerolinea</button>
		              <hr class="my-4">
								</form>
								<h5 class="card-title text-center">Retorno a Administración</h5>
                <form class="form-signin" method="GET" action="{{ url('administration') }}">
                  <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Volver a administración</button>
                    <hr class="my-4">
                  </div>
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
