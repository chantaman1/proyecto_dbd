@extends('layouts.app')

@section('title', 'Vuelos')

@section('content')
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>HOTELES</h3>
					<form id="bookingForm" action="{{ url('getHotels') }}">
						<div class="fl1">
							<div class="tmInput">
								Ciudad
								<input name="ciudad" placeHolder="Escriba ciudad" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
						</div>
						<div class="clear"></div>
						Fecha inicio
						<label class="tmDatepicker">
							<input type="text" name="fecha_inicio" placeHolder='10/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						Fecha fin
						<label class="tmDatepicker">
							<input type="text" name="fecha_fin" placeHolder='20/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<div class="clear"></div>
						<div class="fl1 fl2">
							<em>Adultos</em>
							<select name="adults" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
							</select>
							<div class="clear"></div>
						</div>
						<div class="fl1 fl2">
							<em>Niños</em>
							<select name="children" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
							</select>
						</div>
						<div class="clear"></div>
						<div class="fl1 fl2">
						</div>
						<div class="clear"></div>
						<a href="javascript:" onclick="parentNode.submit();" class="btn" data-type="submit">Buscar hoteles</a>
					</form>
				</div>
			</div>
		</div>
@endsection
