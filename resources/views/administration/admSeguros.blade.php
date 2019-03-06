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
		            <h5 class="card-title text-center">Administrar seguros de {{ $aseguradora }}</h5>
								<form class="form-signin" method="POST" action="{{ url('administrationSegurosDisable') }}">
									<div class="form-group">
										<label for="id_label_single">Seguros existentes</label>
										<label for="id_label_single" style="width: 100%;">
											<select name="seguroId" class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
												@foreach($seguros as $seguro)
                          @if($seguro->activo)
													  <option value="{{ $seguro->id }}">{{ $seguro->tipo }} Precio:{{ $seguro->precio }} STATUS: Activo</option>
                          @else
                            <option value="{{ $seguro->id }}">{{ $seguro->tipo }} Precio:{{ $seguro->precio }} STATUS: Inactivo</option>
                          @endif
                        @endforeach
											</select>
										</label>
                    <div class="form-label-group">
  										<b style="color:red;">{{ $regErr }}</b>
  									</div>
										<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Activar/desactivar seguro</button>
			              <hr class="my-4">
									</div>
								</form>
								<form class="form-signin" method="POST" action="{{ url('administrationSegurosAdd') }}">
									<div class="form-label-group">
										<input name="type" type="name" id="inputName" class="form-control" placeholder="Insurance type" required autofocus>
										<label>Tipo de seguro</label>
									</div>
                  <div class="form-label-group">
										<input name="price" type="name" id="inputName" class="form-control" placeholder="Insurance price" required autofocus>
										<label>precio del seguro</label>
									</div>
                  <div class="form-label-group">
										<input name="description" type="name" id="inputName" class="form-control" placeholder="Insurance description" required autofocus>
										<label>Descripción del seguro</label>
									</div>
									<div class="form-label-group">
										<b style="color:red;">{{ $regErr2 }}</b>
									</div>
		              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Agregar seguro</button>
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
