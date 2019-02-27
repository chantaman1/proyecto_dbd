@extends('layouts.app')

@section('title', 'Vuelos')

@section('content')
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Asientos disponibles</h3>
          @foreach ($asientos as $data)
            <div class="grid_4">
              <a href="pasajero?id={{ $data->id }}&precio={{ $data->precio }}&codigo={{ $data->codigo }}&tipo={{ $data->tipo }}" class="btn"> <strong>Codigo de asiento:</strong> {{$data->codigo}} <br/> <strong>Tipo de asiento:</strong> {{$data->tipo}} <br/> <strong>Precio:</strong> ${{$data->precio}}</a>
            </div>
          @endforeach
				</div>
			</div>
		</div>
@endsection
