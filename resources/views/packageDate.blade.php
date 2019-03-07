@extends('layouts.main')
@section('selected')
	<li class="nav-item">
		<a class="nav-link active" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
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
<!--==============================Content=================================-->
<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
	<div class="overlay"></div>
	<div class="container">
	<div class="row">
		<div class="col-md-6 col-centered">
				<div class="card card-signin my-5">
					<div class="card-body">
						<h5 class="card-title text-center">Datos del paquete con destino a {{ $destino }}</h5>
						<form class="form-signin" method="POST" action="{{ url('selectFechaPaquete') }}">
              <div class="row mb-5">
                <div class="col-md">
                  <div class="form-group">
                    <label for="probootstrap-date-departure">Fecha de ida</label>
                    <div class="probootstrap-date-wrap">
                      <span class="icon ion-calendar"></span>
                      <input name="fecha_origen" type="text" id="probootstrap-date-departure" class="form-control" placeHolder={{ date('d/m/Y') }} data-constraints="@NotEmpty @Required @Date">
                    </div>
                  </div>
                </div>
              </div>


              <div class="row mb-5">
                <div class="col-md">
                  <div class="form-group">
                    <label for="id_label_single">Adultos</label>
                    <select name="cant_adultos" class="js-example-basic-single" style="width: 100%;">
                      <option selected>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>
                </div>
                <div class="col-md">
                  <div class="form-group">
                    <label for="id_label_single2">Niños</label>
                    <select name="cant_ninos" class="js-example-basic-single" style="width: 100%;">
                      <option selected>0</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </div>
                </div>
              </div>
							<div class="row" style="margin-top:0">
						</div>
							<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Continuar compra</button>
							<hr class="my-4">
						</form>
					</div>
				</div>
		</div>
	</div>
</div>
</section>
@endsection
