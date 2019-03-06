@extends('layouts.main')

<link rel="stylesheet" href="assets/css/ticket.css">
<script type="text/javascript" src="assets/js/ticket.js"></script>
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
		<style>
		p {
			text-align:center
		}
		</style>
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->
		<div id="register">
		  <div id="ticket">
		    <h1>¡Gracias por su compra!</h1>
		    <table>

		      <tbody id="entries">
						<p></p>
						<p>Numero Habitación: {{$habitacion->numero}}<p>
						<p>Tipo Cama: {{$habitacion->tipo_cama}}</p>
						<p>Categoría: {{$habitacion->categoria}}</p>
						<p>Capacidad: {{$habitacion->capacidad}}</p>
						<p>Fecha inicio: {{$detalle->fecha_inicio}}</p>
						<p>Fecha fin: {{$detalle->fecha_fin}}</p>
						<p>Ciudad: {{$detalle->ciudad}}</p>
            <p>Nombre Titular Tarjeta: {{$detalle->nombre}}</p>
						<p>Numero Tarjeta: {{$detalle->numero_tarjeta}}</p>
						<p>CVV: {{$detalle->cvv}}</p>
		      </tbody>
					<tfoot>
        <tr>
          <th>Total Pago</th>
          <th id="total">{{$reserva->totalAPagar}}</th>
        </tr>
      </tfoot>
		    </table>
		  </div>
		</div>
@endsection
