@extends('layouts.app')

@section('title', 'Vuelos')

@section('content')
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Datos del pasajero</h3>
					<form id="bookingForm" action="{{ url('comprar') }}">
						<div class="fl1">
							<div class="tmInput">
								<input name="nombre" placeHolder="Nombre..." type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="apellido_paterno" placeHolder="Apellido paterno..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="apellido_materno" placeHolder="Apellido materno..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div id="startFlight">
  							<strong>Fecha de nacimiento</strong>
  							<label class="tmDatepicker">
  								<input type="text" name="fecha_nacimiento" placeHolder={{ date('d-m-Y') }} data-constraints="@NotEmpty @Required @Date">
  							</label>
  						</div>
              <div class="tmInput">
								<input name="telefono" placeHolder="Telefono..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="correo" placeHolder="Correo electronico..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="nacionalidad" placeHolder="Nacionalidad..." type="text" data-constraints="@NotEmpty @Required">
							</div>
              <div class="tmInput">
								<input name="pasaporte" placeHolder="ID pasaporte..." type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<a href="javascript:;" onclick="parentNode.submit();" class="btn" id="submitBtnPassenger" type="submit">Continuar compra!</a>
					</form>
				</div>
			</div>
		</div>
@endsection
