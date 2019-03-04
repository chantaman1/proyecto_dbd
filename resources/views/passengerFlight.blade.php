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
	<li class="nav-item">
		<a class="nav-link" href="/autos">Autos</a>
	</li>
	@if(auth()->check())
		<li class="nav-item dropdown dmenu">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Bienvenido {{ Session::get('usuario_nombre') }}
			</a>
			<div class="dropdown-menu sm-menu">
				<a class="dropdown-item" href="/buyHistory">Historial de compras</a>
				<a class="dropdown-item" href="/checkin">Check-in</a>
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
<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
	<div class="overlay"></div>

</section>
<!-- END section -->
<!--==============================Content=================================-->
		<div class="content">
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Datos del pasajero</h3>
					<form id="bookingForm" action="{{ url('comprar') }}">
						<div class="fl1">
							<div class="tmInput">
								<input name="nombre" placeHolder="Nombre..." type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="apellido_paterno" placeHolder="Apellido paterno..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="apellido_materno" placeHolder="Apellido materno..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div id="startFlight">
  							<strong>Fecha de nacimiento</strong>
  							<label class="tmDatepicker">
  								<input type="text" name="fecha_nacimiento" placeHolder={{ date('d-m-Y') }} data-constraints="@NotEmpty @Required @Date">
  							</label>
  						</div>
              <div class="tmInput">
								<input name="telefono" placeHolder="Telefono..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="correo" placeHolder="Correo electronico..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="nacionalidad" placeHolder="Nacionalidad..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="pasaporte" placeHolder="ID pasaporte..." type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<a href="javascript:;" onclick="parentNode.submit();" class="btn" id="submitBtnPassenger" type="submit">Continuar compra!</a>
					</form>
				</div>
			</div>
		</div>
@endsection
