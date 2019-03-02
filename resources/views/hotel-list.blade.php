@extends('layouts.app')

@section('title', 'Hoteles Disponibles')

@section('content')
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
	<div class="container_12 offset-by-six">
		<div class="clear"></div>
			<h3>Hoteles disponibles en la ciudad</h3>
			@foreach ($hotels as $data)
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
				<a  href="mostrar_habitaciones?id={{ $data->id }}">
					<img src='images/hotel.jpg' align="left" height="200" width="200" style="margin:30px; padding:10px">
		      <div class="card-body" style="color:black">
		        <h4 style="color:#3433FF; margin: 10px; padding: 10px"><ins>{{$data->nombre}}</ins></h4>
						<p>Calificación {{$data->calificacion}}</p>
		        <p>Dirección: {{$data->direccion}}</p>
		        <p>Teléfono: {{$data->telefono}}</p>
		        <p>{{$data->ciudad}}, {{$data->pais}} </p>
		        <h6><ins>{{$data->webpage}}</ins></h6>
						<br>
	    		</div>
				</a>
			</div>
			<br>
			@endforeach
	</div>
</div>
@endsection
