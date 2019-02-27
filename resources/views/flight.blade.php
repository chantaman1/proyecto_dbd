@extends('layouts.app')

@section('title', 'Vuelos')

@section('content')
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Vuelos</h3>
					<form id="bookingForm" action="{{ url('results') }}">
						<div class="fl1">
							<div class="tmInput">
								<input name="origen" id="origen" placeHolder="Origen: Ciudad" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="destino" id="destino" placeHolder="Destino: Ciudad" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<div class="tmRadio">
							<p>Tipo de viaje</p>
							<input name="tmBtn" value="both" type="radio" id="tmRadio0" data-constraints='@RadioGroupChecked(name="tmBtn", groups=[RadioGroup])' checked/>
							<span>Ida y vuelta</span>
							<input name="tmBtn" value="oneWay" type="radio" id="tmRadio1" data-constraints='@RadioGroupChecked(name="tmBtn", groups=[RadioGroup])' />
							<span>Solo ida</span>
						</div>
						<div class="clear"></div>
						<div id="startFlight">
							<strong>Fecha de ida</strong>
							<label class="tmDatepicker">
								<input type="text" id="fecha_origen" name="fecha_origen" placeHolder={{ date('m/d/Y') }} data-constraints="@NotEmpty @Required @Date">
							</label>
						</div>
						<div class="clear"></div>
						<div id="returnFligth">
							<strong>Fecha de regreso</strong>
							<label class="tmDatepicker">
								<input type="text" id="fecha_regreso" name="fecha_regreso" placeHolder={{ "Fecha" }} data-constraints="@NotEmpty @Required @Date">
							</label>
						</div>
						<div class="clear"></div>
						<div class="fl1 fl2">
							<em>Adultos</em>
							<select name="cant_adultos" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
							<div class="clear"></div>
						</div>
						<div class="fl1 fl2">
							<em>Niños</em>
							<select name="cant_ninos" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>0</option>
								<option>0</option>
								<option>1</option>
								<option>2</option>
							</select>
						</div>
						<div class="clear"></div>
						<a href="javascript:;" onclick="" class="btn" id="submitBtnFligth" type="submit">Buscar vuelos</a>
					</form>
				</div>
			</div>
		</div>
@endsection
