@extends('layouts.main')

@section('selected')
	<li class="nav-item">
		<a class="nav-link" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link active" href="/hoteles">Hoteles</a>
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

<section class="probootstrap_section" id="section-city-guides">
		<h3 style="text-align: center">Habitaciones disponibles en el hotel</h3>
		<br>
		<div class="container_12" >
			@foreach ($habitacions as $data)
			<div class="card" style="
		    font-weight: bold;
		    border: 1px solid #0C0C19;
		    border-radius: 10px;
		    background: #ffffff;
		    box-shadow: inset 0px 0px 5px #0C0C19;
		    -moz-box-shadow: inset 0px 0px 5px #0C0C19;
		    -webkit-box-shadow: inset 0px 0px 5px #2B2B33;
				text-align: left;
		    text-shadow: 1px 1px 1px #fff;">
				<a href="reservar_habitacion?id={{ $data->id }}">
					<img src='images/habitacion-suite-cama.jpg' align="left" height="200" width="200" style="margin:30px; padding:10px">
		      <div class="card-body" style="color:black">
		        <h4 style="color:#3433FF; margin: 10px; padding: 10px"><ins>{{$data->categoria}}</ins></h4>
						<p>Tipo Cama: {{$data->tipo_cama}}</p>
		        <p>Numero: {{$data->numero}}</p>
		        <p>Capacidad: {{$data->capacidad}}</p>
		        <p>Categoría: {{$data->categoria}}</p>
		        <h6><b style="color: black; padding: 10px">Precio: ${{$data->precio}}</b></h6>
						<br>
	    		</div>
				</a>
			</div>
			<br>
			@endforeach
		</div>
</section>
@endsection
