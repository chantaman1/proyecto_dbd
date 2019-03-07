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
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<br>
					@if($ida)
						<h1 style="text-align:center">Vuelos disponibles IDA</h1>
					@else
						<h1 style="text-align:center">Vuelos disponibles REGRESO</h1>
					@endif
					<br>
	      	@foreach ($vuelos as $data)
					<div class="card" style="
				    font-weight: bold;
				    border: 1px solid #0C0C19;
				    border-radius: 10px;
				    background: #0000FF;
						margin-left:auto;
    				margin-right:auto;
				    box-shadow: inset 0px 0px 5px #0C0C19;
				    -moz-box-shadow: inset 0px 0px 5px #0C0C19;
				    -webkit-box-shadow: inset 0px 0px 5px #2B2B33;
						text-align: center;
						width: 45%;
						height: 50%;
				    text-shadow: 1px 1px 1px #fff;">
						@if($vuelta == "both")
						<a  href="resultBackFlight?id={{ $data->id }}">
				      <div class="card-body" style="color:black">
				        <h6 style="color:#ffffff; margin: 0px; padding: 5px"><b>{{$data->hora}} del {{$data->fecha}}</b></h6>
								<h6 style="color:#ffffff; margin: 0px; padding: 5px">Origen: {{$data->ciudad_origen}}, {{$data->pais_origen}}</h6>
				        <h6 style="color:#ffffff; margin: 0px; padding: 5px">Destino: {{$data->ciudad_destino}}, {{$data->pais_destino}}</h6>
			    		</div>
						</a>
						@else
							<a  href="selecAsientoIda?id={{ $data->id }}">
								<div class="card-body" style="color:black">
									<h6 style="color:#ffffff; margin: 0px; padding: 5px"><b>{{$data->hora}} del {{$data->fecha}}</b></h6>
									<h6 style="color:#ffffff; margin: 0px; padding: 5px">Origen: {{$data->ciudad_origen}}, {{$data->pais_origen}}</h6>
									<h6 style="color:#ffffff; margin: 0px; padding: 5px">Destino: {{$data->ciudad_destino}}, {{$data->pais_destino}}</h6>
								</div>
							</a>
						@endif
					</div>
          @endforeach
				</div>
			</div>
@endsection
