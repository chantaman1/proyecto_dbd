@extends('layouts.app')

@section('title', 'Habitaciones Disponibles')

@section('content')
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
	<div class="container_12 offset-by-six">
		<div class="clear"></div>
		<div class="grid_6">
			<h3>Habitaciones disponibles en el hotel</h3>
			@foreach ($habitacions as $data)
				<div class="grid_4">
					<a href="reservar_habitacion/{{ $data->id }}" class="btn"> <strong>Numero:</strong> {{$data->numero}} <br/> <strong>Capacidad:</strong> {{$data->capacidad}} <br/> <strong>Tipo Cama:</strong> {{$data->tipo_cama}} <br/> <strong>Categoría:</strong> {{$data->categoria}} <br/> <strong>Precio:</strong> {{$data->precio}} <br/></a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
