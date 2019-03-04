@extends('layouts.main')

@section('selected')
	<li class="nav-item"><a class="nav-link" href="/vuelos">Vuelos</a></li>
	<li class="nav-item"><a class="nav-link" href="/hoteles">Hoteles</a></li>
	<li class="nav-item active"><a class="nav-link" href="/paquetes">Paquetes</a></li>
	<li class="nav-item"><a class="nav-link" href="/autos">Autos</a></li>
	<li class="nav-item"><a class="nav-link" href="/login">Iniciar Sesión</a></li>
@endsection

@section('content')

		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->



    <!-- END section -->
@endsection
