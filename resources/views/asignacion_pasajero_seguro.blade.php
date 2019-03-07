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
		<a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Seguro de viajes
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
			<a class="nav-link" href="/login">Iniciar sesion</a>
		</li>
	@endif
@endsection
@section('content')
<!--==============================Content=================================-->
<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
	<div class="overlay"></div>
	<div class="container">
	<div class="row" >
    <div class="col-md-6 col-centered"  style="margin-top:-6%">
        <form action="{{ url('buscar_pasajero') }}" class="probootstrap-form">
          <h5 class="card-title text-center">Buscar pasajero</h5>
          <div class="form-group">
            <div class="row mb-3">
              <div class="col-md">
                <div class="form-group">
                  <label for="id_label_single">Nombre</label>

                  <label for="id_label_single" style="width: 100%;">
                    <input name="nombre" placeholder="Name..." type="text" class="form-control" required autofocus>
                  </label>
                </div>
              </div>
            </div>

            <!-- END row -->

             <div class="row mb-3">
              <div class="col-md">
                <div class="form-group">
                  <label for="id_label_single">Apellido</label>

                  <label for="id_label_single" style="width: 100%;">
                    <input name="apellido" placeholder="Surname..." type="text" class="form-control" required autofocus>
                  </label>
                </div>
              </div>
            </div>
            <!-- END row -->
            <div class="row mb-3">
              <div class="col-md">
                <div class="form-group">
                  <label for="id_label_single">Pasaporte</label>

                  <label for="id_label_single" style="width: 100%;">
                    <input name="pasaporte" placeholder="Passport..." type="text" class="form-control" required autofocus>
                  </label>
                </div>
              </div>
            </div>
            <!-- END row -->
            <div class="row">
              <div class="col-md">
                </div>
              <div class="col-md">
                <input type="submit" value="Buscar" class="btn btn-primary btn-block" href="javascript:" onclick="parentNode.submit();">
              </div>
            </div>
          </div>
        </form>
      </div>
</div>
</div>
</section>
@endsection
