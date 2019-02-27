@extends('layouts.app')

@section('title', 'Paquetes')

@section('content')
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
  <div class="container_12 offset-by-six">
    <div class="clear"></div>
    <div class="grid_6">
      <h3>Resumen de pago</h3>
        <div class="grid_4">
          <a class="btn"> <strong>Destino:</strong> {{$data->destino}} <br/> <strong>Total de noches:</strong> 7 <br/> <strong>Precio:</strong> {{$data->precio}} </a>
        </div>
        <div class="clear"></div>
    </div>
		<div class="grid_6">
			<h3>Datos tarjeta de credito</h3>
			<form id="bookingForm" action="{{ url('finalizarPaquete') }}">
				<div class="fl1">
					<div class="tmInput">
						<input id="owner" name="nombre" placeHolder="Nombre tarjeta..." type="text" data-constraints='@NotEmpty @Required'>
					</div>
					<div class="tmInput">
						<input id="cardNumber" name="numero" placeHolder="Numero de tarjeta..." type="text" data-constraints="@NotEmpty @Required">
					</div>
					<div class="fl1 fl2">
						<em>Mes</em>
						<select name="mes" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
						<div class="clear"></div>
						<em>Año</em>
						<select name="ano" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
						</select>
					</div>
					<div class="tmInput">
						<input id="cvv" name="cvv" placeHolder="CVV..." type="text" data-constraints="@NotEmpty @Required">
					</div>
				</div>
				<div class="clear"></div>
				<a href="javascript:;" onclick="parentNode.submit();" id="confirmButton" class="btn" type="submit">Realizar pago</a>
			</form>
		</div>
  </div>
</div>
@endsection
