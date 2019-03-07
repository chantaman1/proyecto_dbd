@extends('layouts.main')

<link rel="stylesheet" href="assets/css/ticket.css">
<script type="text/javascript" src="assets/js/ticket.js"></script>
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
		<style>
		p {
			text-align:center;
			text-transform:uppercase;
		}
		</style>
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->
		<div id="register">
		  <div id="ticket">
		    <h1>¡Check-in de su viaje!</h1>
		    <table>

		      <tbody id="entries">
						<p></p>
						<p>:Código reserva {{$reserva->reserva}}<p>
						<p>Nombre Pasajero: {{$asiento->pasajero->nombre}}</p>
						<p>Apellido Paterno: {{$asiento->pasajero->apellido_paterno}}</p>
						<p>Apellido Materno: {{$asiento->pasajero->apellido_materno}}</p>
						<p>Fecha despegue: {{$asiento->vuelo->fecha}}</p>
            <p>Hora despegue: {{$asiento->vuelo->hora}}</p>
						<p>Código Asiento: {{$asiento->codigo}}</p>
            <p>Ciudad Origen: {{$asiento->vuelo->ciudad_origen}}</p>
						<p>Ciudad Destino: {{$asiento->vuelo->ciudad_destino}}</p>
		      </tbody>
					<tfoot>
        <tr style="font-size:200%;">

        </tr>
      </tfoot>
		    </table>
		  </div>
		</div>
@endsection
