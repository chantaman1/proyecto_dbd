@extends('layouts.main')

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



    <!-- END section -->
@endsection
