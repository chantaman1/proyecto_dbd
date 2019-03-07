@extends('layouts.main')
<style>
.tab {overflow: hidden; border: 1px solid #ccc;
background-color: #f1f1f1;}

.tabcontent {display: none; padding: 6px 12px; border: 1px solid #ccc;
    border-top: none;}

.tab button {background-color: inherit; float: left; border: none;
    outline: none; cursor: pointer; padding: 14px 16px;
    transition: 0.3s;}

.tab button:hover {background-color: #ddd;}

.tab .active {background-color: #ccc;}

.tabcontent {display: none; padding: 6px 12px;

border: 1px solid #ccc; border-top: none;}

table {font-family: arial, sans-serif; border-collapse: collapse;
    width: 100%;}

td, th {border: 1px solid #dddddd; padding: 8px;
    text-align: center;}

/*Change color to gray*/
tr:nth-child(even) {
    background-color: #dddddd;}

.actived a{color:green}
.actived a:hover{ font-weight: bold}

.deactivated a{color:red}
.deactivated a:hover{ font-weight: bold}

.available {color:green; }
.disable{ color: red; font-weight: bold}
.intraining{color: blue; font-weight: bold}
</style>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";}

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");}

document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";}
</script>

@section('selected')
	<li class="nav-item">
		<a class="nav-link" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/hoteles">Hoteles</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="/paquetes">Paquetes</a>
	</li>
	<li class="nav-item dropdown dmenu">
		<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Servicios
		</a>
		<div class="dropdown-menu sm-menu">
			<a class="dropdown-item" href="/autos">Arriendo de autos</a>
			<a class="dropdown-item" href="/seguros">Seguro de viajes</a>
		</div>
	</li>
	@if(auth()->check())
		<li class="nav-item dropdown dmenu">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Bienvenido {{ Session::get('usuario_nombre') }}
			</a>
			<div class="dropdown-menu sm-menu">
				<a class="dropdown-item" href="/buyHistory">Historial de compras</a>
				<a class="dropdown-item" href="/checkin">Check-in</a>
				@if(Session::get('usuario_rol') == 'administrador')
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="/administration">Administration</a>
				@endif
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="/logout">Cerrar sesion</a>
			</div>
		</li>
	@else
		<li class="nav-item">
			<a class="nav-link active" href="/login">Iniciar sesion</a>
		</li>
	@endif
@endsection
@section('content')
<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
  <div class="overlay"></div>

</section>
<!-- END section -->
<!--==============================Content=================================-->
<div class="container">
	<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Vuelos')">Vuelos</button>
  <button class="tablinks" onclick="openCity(event, 'Habitaciones')">Habitaciones</button>
  <button class="tablinks" onclick="openCity(event, 'Autos')">Autos</button>
  <button class="tablinks" onclick="openCity(event, 'Paquetes')">Paquetes</button>
  <button class="tablinks" onclick="openCity(event, 'Seguros')">Seguros</button>
</div>
<div id="Vuelos" class="tabcontent">
  <table>
  <tr>
    <th>Numero Reserva</th>
    <th>Ciudad Origen</th>
    <th>Ciudad Destino</th>
    <th>Fecha Salida</th>
    <th>Apellido Pasajero</th>
    <th>Código Asiento</th>
    <th>Tipo Asiento</th>
    <th>Precio</th>
  </tr>
  @foreach ($user->reservas as $reserva)
  @foreach($reserva->asientos as $asiento)
  <tr>
    <td>{{$reserva->reserva}}</td>
    <td>{{$asiento->vuelo->ciudad_origen}}</td>
    <td>{{$asiento->vuelo->ciudad_destino}}</td>
    <td>{{$asiento->vuelo->fecha}}</td>
    <td>{{$asiento->pasajero->apellido_paterno}}</td>
    <td>{{$asiento->codigo}}</td>
    <td>{{$asiento->tipo}}</td>
    <td>{{$asiento->precio}}</td>
  </tr>
  @endforeach
  @endforeach
</table>
</div>

<div id="Habitaciones" class="tabcontent">
  <table>
  <tr>
    <th>Numero Reserva</th>
    <th>Ciudad</th>
    <th>Hotel</th>
    <th>Dirección</th>
    <th>Número de Hab.</th>
    <th>Categoría</th>
    <th>Precio</th>
  </tr>
  @foreach ($user->reservas as $reserva)
  @foreach($reserva->habitacions as $habitacion)
  <tr>
    <td>{{$reserva->reserva}}</td>
    <td>{{$habitacion->hotel->ciudad}}</td>
    <td>{{$habitacion->hotel->nombre}}</td>
    <td>{{$habitacion->hotel->direccion}}</td>
    <td>{{$habitacion->numero}}</td>
    <td>{{$habitacion->categoria}}</td>
    <td>{{$reserva->totalAPagar}}</td>
  </tr>
  @endforeach
  @endforeach
</table>
</div>

<div id="Autos" class="tabcontent">
  <table>
  <tr>
    <th>Numero Reserva</th>
    <th>Ciudad</th>
    <th>Dirección</th>
    <th>Patente</th>
    <th>Marca</th>
    <th>Modelo</th>
    <th>Precio</th>
  </tr>
  @foreach ($user->reservas as $reserva)
  @foreach($reserva->vehiculos as $vehiculo)
  <tr>
    <td>{{$reserva->reserva}}</td>
    <td>{{$vehiculo->compania_alquiler->ciudad}}</td>
    <td>{{$vehiculo->compania_alquiler->direccion}}</td>
    <td>{{$vehiculo->patente}}</td>
    <td>{{$vehiculo->marca}}</td>
    <td>{{$vehiculo->modelo}}</td>
    <td>{{$reserva->totalAPagar}}</td>
  </tr>
  @endforeach
  @endforeach
 </table>
</div>

<div id="Paquetes" class="tabcontent">
  <table>
    <tr>
      <th>Numero Reserva</th>
      <th>País</th>
      <th>Ciudad</th>
      <th>Incluye Habitación</th>
      <th>Incluye Vehículo</th>
      <th>Descuento</th>
      <th>Precio</th>
    </tr>
    @foreach ($user->reservas as $reserva)
    @foreach($reserva->paquetes as $paquete)
    <tr>
      <td>{{$reserva->reserva}}</td>
      <td>{{$paquete->pais_destino}}</td>
      <td>{{$paquete->ciudad_destino}}</td>
      @if($paquete->posee_hotel)
      <td>Si</td>
      @else
      <td>No</td>
      @endif
      @if($paquete->posee_vehiculo)
      <td>Si</td>
      @else
      <td>No</td>
      @endif
      <td>{{$paquete->descuento}}</td>
      <td>{{$reserva->totalAPagar}}</td>
    </tr>
    @endforeach
    @endforeach
 </table>
</div>

<div id="Seguros" class="tabcontent">
  <table>
  <tr>
    <th>ID Seguro</th>
    <th>Tipo Seguro</th>
    <th>Nombre Pasajero</th>
    <th>Apellido Pasajero</th>
    <th>Precio</th>
  </tr>
  @foreach ($user->reservas as $reserva)
  @foreach ($reserva->asientos as $asiento)
  @if($asiento->pasajero != NULL)
  @foreach ($asiento->pasajero->seguros as $seguro)
  <tr>
    <td>{{$seguro->id}}</td>
    <td>{{$seguro->tipo}}</td>
    <td>{{$asiento->pasajero->nombre}}</td>
    <td>{{$asiento->pasajero->apellido_paterno}}</td>
    <td>{{$seguro->precio}}</td>
  </tr>
  @endforeach
  @endif
  @endforeach
  @endforeach
 </table>
</div>
</div>
@endsection
