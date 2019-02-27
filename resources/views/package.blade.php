@extends('layouts.app')

<link rel="stylesheet" href="css/card.css">

@section('title', 'Paquetes')

@section('content')
<div class="content"><div class="ic"></div>
	<div class="container_12">
		<div class="grid_4">
		</div>
		<div class="clear"></div>
  <h1>PAQUETES</h1>
<!-- punkut-->
@foreach($paquetes as $paquete)
<div class="viini-kortti p-marjaisa" style="background-image: url({{$paquete->image}})">
	<a  href="comprar_paquete?id={{ $paquete->id }}&precio={{ $paquete->precio }}&destino={{ $paquete->ciudad_destino }}" style="color:white">
  <h2 style="font-size: 20px; font-weight: bold">{{$paquete->ciudad_destino}}</h2>
  <ul>
		<li style="font-size: 10px">Directo</li>
    <li style="font-size: 20px">Cupos: {{$paquete->cupos}}</li>
    <li style="font-size: 30px; font-weight: bold">CLP$ {{number_format($paquete->precio, 0, '', '.')}}</li>
		@if($paquete->posee_hotel == true)
		<li>7 noches en hotel</li>
		@else
		<li>No incluye hospedaje</li>
		@endif
		@if($paquete->posee_vehiculo == true)
		<li>Incluye traslados</li>
		@else
		<li>No incluye traslados</li>
		@endif
		@if($paquete->posee_seguro == true)
		<li>Incluye seguro de viaje</li>
		@else
		<li>No incluye seguro de viaje</li>
		@endif
		@if($paquete->descuento > 0)
		<strong style="font-size: 30px; color: #c73430; font-weight: bold">{{$paquete->descuento}}% Descuento</strong>
		@endif
  </ul>
</a>
</div>
@endforeach
	</div>
</div>
@endsection
