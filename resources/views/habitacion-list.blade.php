@extends('layouts.app')

@section('title', 'Habitaciones Disponibles')

@section('content')
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
	<div class="container_12 offset-by-six">
		<div class="clear"></div>
		<h3>Habitaciones disponibles en el hotel</h3>
		<div class="container_12 offset-by-six" style="display: inline-block; vertical-align: top;">
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
				<a href="reservar_habitacion/{{ $data->id }}">
					<img src='images/habitacion-suite-cama.jpg' align="left" height="200" width="200" style="margin:30px; padding:10px">
		      <div class="card-body" style="color:black">
		        <h4 style="color:#3433FF; margin: 10px; padding: 10px"><ins>{{$data->categoria}}</ins></h4>
						<p>Tipo Cama: {{$data->tipo_cama}}</p>
		        <p>Numero: {{$data->numero}}</p>
		        <p>Capacidad: {{$data->capacidad}}</p>
		        <p>Categoría: {{$data->categoria}}</p>
		        <h6><b style="color: black">Precio: ${{$data->precio}}</b></h6>
						<br>
	    		</div>
				</a>
			</div>
			<br>
			@endforeach
		</div>
	</div>
</div>
@endsection
