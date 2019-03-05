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
<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
	<div class="overlay"></div>

</section>
<!-- END section -->
		<div class="content">
				<div class="grid_6">
					<br>
					<h1 style="text-align:center">Asientos disponibles</h1>
					<br>
          @foreach ($asientos as $data)
            <div class="grid_4">
              <a href="pasajero?id={{ $data->id }}&precio={{ $data->precio }}&codigo={{ $data->codigo }}&tipo={{ $data->tipo }}" style="background: #ffffff; color: #04B404; box-shadow: inset 0px 0px 5px #0C0C19;
					    -moz-box-shadow: inset 0px 0px 5px #0C0C19;
					    -webkit-box-shadow: inset 0px 0px 5px #2B2B33;
							border: 1px solid #04B404;
							display:inline-block;
							display: flex;
					    border-radius: 10px;" class="btn">
							  <strong style="position: absolute; left:10%">Codigo de asiento:</strong><i style="position: absolute; left:25%"> {{$data->codigo}} </i><br/> <strong style="position: absolute; left:35%">Tipo de asiento:</strong><i style="position: absolute; left:50%"> {{$data->tipo}} </i> <br/> <strong style="position: absolute; left:75%">Precio:</strong><i style="position: absolute; left:85%"> ${{$data->precio}}</i></a>
            </div>
          @endforeach
				</div>
		</div>
		<br>
@endsection
