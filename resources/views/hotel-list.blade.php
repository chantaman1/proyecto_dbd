@extends('layouts.app')

@section('title', 'Hoteles Disponibles')

@section('content')
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
	<div class="container_12 offset-by-six">
		<div class="clear"></div>
		<div class="grid_6">
			<h3>Hoteles disponibles en la ciudad</h3>
			@foreach ($hotels as $data)
				<div class="grid_4">
					<a href="mostrar_habitaciones?id={{ $data->id }}" class="btn"> <strong>Nombre:</strong> {{$data->nombre}} <br/> <strong>Dirección:</strong> {{$data->direccion}} <br/> <strong>Teléfono:</strong> {{$data->telefono}} <br/> <strong>Ciudad:</strong> {{$data->ciudad}} <br/> <strong>País:</strong> {{$data->pais}} <br/> <strong>Calificación:</strong> {{$data->calificacion}} <strong>WebPage:</strong> {{$data->webpage}} <br/></a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
