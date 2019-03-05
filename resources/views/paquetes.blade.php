@extends('layouts.main')

<link rel="stylesheet" href="css/card.css">

@section('selected')
	<li class="nav-item">
		<a class="nav-link" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/hoteles">Hoteles</a>
	</li>
	<li class="nav-item">
		<a class="nav-link active" href="/paquetes">Paquetes</a>
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
				<h2 class="display-4 border-bottom probootstrap-section-heading" style="text-align: center;">PAQUETES</h2>
				<div class="row justify-content-center mb-5">
						@foreach($paquetes as $paquete)
						<div class="viini-kortti p-marjaisa" style="background-image: url({{$paquete->image}})">
							<a  href="comprar_paquete?id={{ $paquete->id }}&precio={{ $paquete->precio }}&destino={{ $paquete->ciudad_destino }}" style="color:white">
						  <h2 style="font-size: 30px; font-weight: bold; text-shadow: 1px 1px black; color: white">{{$paquete->ciudad_destino}}</h2>
						  <ul>
								<li style="font-size: 10px">Directo</li>
						    <li style="font-size: 20px">Cupos: {{$paquete->cupos}}</li>
						    <li style="font-size: 30px; font-weight: bold; text-shadow: 1px 1px black">CLP$ {{number_format($paquete->precio, 0, '', '.')}}</li>
								@if($paquete->posee_hotel == true)
								<li>7 noches en hotel</li>
								@else
								<li>No incluye hospedaje</li>
								@endif
								@if($paquete->posee_vehiculo == true)
								<li>Incluye traslados</li>
								@else
								<li>No incluye traslados</li>
								@endif
								@if($paquete->posee_seguro == true)
								<li>Incluye seguro de viaje</li>
								@else
								<li>No incluye seguro de viaje</li>
								@endif
								@if($paquete->descuento > 0)
								<strong style="font-size: 30px; color: #ed1650; font-weight: bold; background-color: #ffe200">-{{$paquete->descuento}}%</strong>
								@endif
						  </ul>
						</a>
						</div>
						@endforeach


				</div>

			</div>
		</section>

    <!-- END section -->
@endsection
