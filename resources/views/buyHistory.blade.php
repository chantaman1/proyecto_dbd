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
    <th>Código Asiento</th>
    <th>Tipo Asiento</th>
    <th>Precio</th>
  </tr>
  <tr>
    <td>Ubuntu Server 16.04.4</td>
    <td class="actived"><a href="#">Available</a></td>
    <td>1 year, 11 months, 23 hours, 59minutes, 59seconds</td>
  </tr>
  <tr>
    <td>Virtual Machine Windows Server 2002</td>
    <td class="actived"><a href="#">Available</a></td>
   <td>2 year, 11 months, 23 hours, 59minutes, 59seconds</td>
  </tr>
  <tr>
    <td>Windows 10 Spark server</td>
    <td class="deactivated"><a href="#">Unavailable</a></td>
    <td>0 year, 6 months, 2 hours, 9minutes, 40seconds</td>
  </tr>
  <tr>
    <td>Windows XP Professional</td>
    <td class="deactivated"><a href="#">Unavailable</a></td>
   <td>0 year, 0 month, 0 hours, 0 minutes, 0 seconds</td>
  </tr>

</table>
</div>

<div id="Habitaciones" class="tabcontent">
  <table>
  <tr>
    <th>Numero Reserva</th>
    <th>Ciudad</th>
    <th>Hotel</th>
    <th>Dirección</th>
    <th>Número Hab.</th>
    <th>Categoría</th>
    <th>Precio</th>
  </tr>
  <tr>
    <td>Orange</td>
    <td>1 unit</td>
    <td>U$ 0,10</td>
  </tr>
  <tr>
    <td>Pineapple</td>
    <td>1 unit</td>
   <td>U$ 0,20</td>
  </tr>
  <tr>
    <td>Strawberry</td>
    <td>1 unit</td>
    <td>U$ 0,40</td>
  </tr>
  <tr>
    <td>Apple</td>
    <td>2 units</td>
   <td>U$ 0,40</td>
  </tr>

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
    <th>Categoría</th>
    <th>Precio</th>
  </tr>
  <tr>
    <td>Leandro Bizzinotto Ferreira</td>
    <td>Web Designer</td>
    <td>23/09/1994</td>
    <td class="intraining">In training</td>
  </tr>
  <tr>
    <td>Cristiano Bizzinotto Ferreira</td>
    <td>Advertising</td>
    <td>23/09/1994</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Amanda Maria Bizzinotto Ferreira</td>
    <td>Polyglot, Translator, Developer</td>
    <td>17/07/1993</td>
    <td class="vacation">Vacation</td>
  </tr>
  <tr>
    <td>Luis Antonio Ferreira</td>
    <td>Personal Manager</td>
    <td>20/08/1966</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Luis Antonio Ferreira</td>
    <td>Personal Manager</td>
    <td>20/08/1968</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Rita Helena Bizzinotto Ferreira</td>
    <td>Housewife</td>
    <td>20/07/1962</td>
    <td class="disable">Disable</td>
  </tr>
 </table>
</div>

<div id="Paquetes" class="tabcontent">
  <table>
  <tr>
    <th>Officers</th>
    <th>Department</th>
    <th>Date of birth</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>Leandro Bizzinotto Ferreira</td>
    <td>Web Designer</td>
    <td>23/09/1994</td>
    <td class="intraining">In training</td>
  </tr>
  <tr>
    <td>Cristiano Bizzinotto Ferreira</td>
    <td>Advertising</td>
    <td>23/09/1994</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Amanda Maria Bizzinotto Ferreira</td>
    <td>Polyglot, Translator, Developer</td>
    <td>17/07/1993</td>
    <td class="vacation">Vacation</td>
  </tr>
  <tr>
    <td>Luis Antonio Ferreira</td>
    <td>Personal Manager</td>
    <td>20/08/1966</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Luis Antonio Ferreira</td>
    <td>Personal Manager</td>
    <td>20/08/1968</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Rita Helena Bizzinotto Ferreira</td>
    <td>Housewife</td>
    <td>20/07/1962</td>
    <td class="disable">Disable</td>
  </tr>
 </table>
</div>

<div id="Seguros" class="tabcontent">
  <table>
  <tr>
    <th>Tipo Seguro</th>
    <th>Nombre Pasajero</th>
    <th>Apellido Pasajero</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>Leandro Bizzinotto Ferreira</td>
    <td>Web Designer</td>
    <td>23/09/1994</td>
    <td class="intraining">In training</td>
  </tr>
  <tr>
    <td>Cristiano Bizzinotto Ferreira</td>
    <td>Advertising</td>
    <td>23/09/1994</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Amanda Maria Bizzinotto Ferreira</td>
    <td>Polyglot, Translator, Developer</td>
    <td>17/07/1993</td>
    <td class="vacation">Vacation</td>
  </tr>
  <tr>
    <td>Luis Antonio Ferreira</td>
    <td>Personal Manager</td>
    <td>20/08/1966</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Luis Antonio Ferreira</td>
    <td>Personal Manager</td>
    <td>20/08/1968</td>
    <td class="available">Available</td>
  </tr>
  <tr>
    <td>Rita Helena Bizzinotto Ferreira</td>
    <td>Housewife</td>
    <td>20/07/1962</td>
    <td class="disable">Disable</td>
  </tr>
 </table>
</div>
</div>
@endsection
