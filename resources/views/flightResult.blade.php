@extends('layouts.app')

@section('title', 'Vuelos')

@section('content')
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					@if(Session::get('pasoActual') === 0)
						<h3>Vuelos disponibles IDA</h3>
					@else
						<h3>Vuelos disponibles REGRESO</h3>
					@endif
          @foreach ($vuelos as $data)
            <div class="grid_4">
              <a href="selecAsiento?id={{ $data->id }}&destino={{ $data->ciudad_destino }}" class="btn"> <strong>Pais de origen:</strong> {{$data->pais_origen}} <br/> <strong>Ciudad de origen:</strong> {{$data->ciudad_origen}} <br/> <strong>Pais de destino:</strong> {{$data->pais_destino}} <br/> <strong>Ciudad de destino:</strong> {{$data->ciudad_destino}} <br/> <strong>Fecha de salida:</strong> {{$data->fecha}} <br/> <strong>Hora de salida:</strong> {{$data->hora}}</a>
            </div>
          @endforeach
				</div>
			</div>
		</div>
@endsection
