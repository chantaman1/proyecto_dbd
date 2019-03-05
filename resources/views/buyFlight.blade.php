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
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
  <div class="container_12 offset-by-six">
    <div class="clear"></div>
    <div class="grid_6">
      <h3>Resumen de pago</h3>
			@foreach ($data as $dt)
        <div class="grid_4">
          <a class="btn"> <strong>Tipo de viaje:</strong> {{ $dt->tipo_viaje }} <br/> <strong>Pasajero:</strong> {{$dt->nombre}} {{$dt->apellido_paterno}} {{$dt->apellido_materno}} <br/> <strong>Numero de asiento:</strong> {{$dt->asiento_codigo}} <br/> <strong>Tipo de asiento:</strong> {{$dt->asiento_tipo}} <br/> <strong>Precio:</strong> ${{$dt->asiento_precio}} <br/> <strong>Ciudad origen:</strong> {{$dt->origen}} <br/> <strong>Ciudad destino:</strong> {{$dt->destino}} </a>
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
@endsection
