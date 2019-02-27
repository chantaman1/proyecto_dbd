@extends('layouts.app')

@section('title', 'Vehiculos')

@section('content')
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
	<div class="container_12 offset-by-six">
		<div class="clear"></div>
		<div class="grid_6">
			<h3>Vehiculos disponibles en la ciudad</h3>
			@foreach ($vehiculos as $data)
				<div class="grid_4">
					<a href="comprar_auto?id={{ $data->id }}" class="btn"> <strong>Patente:</strong> {{$data->patente}} <br/> <strong>Marca:</strong> {{$data->marca}} <br/> <strong>Modelo:</strong> {{$data->modelo}} <br/> <strong>Año:</strong> {{$data->año}} <br/> <strong>Precio:</strong> {{$data->precio}} <br/> <strong>Cantidad de asientos:</strong> {{$data->cantidad_asientos}} <strong>Tipo Transmisión:</strong> {{$data->tipo_transmision}} <br/> <strong>Descripción:</strong> {{$data->descripcion}} <br/></a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
