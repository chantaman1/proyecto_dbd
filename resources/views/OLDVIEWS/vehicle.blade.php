@extends('layouts.app')

@section('title', 'Vehiculos')

@section('content')
		<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
			<div class="container_12 offset-by-six">
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Encuentra el alquiler perfecto</h3>
					<form id="bookingForm" action="{{ url('cars') }}">
						<div class="fl1">
							<div class="tmInput">
                <label>Ciudad de alquiler</label>
								<input name="ciudad" placeHolder="Ciudad" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<strong>Fecha arriendo</strong>
						<label class="tmDatepicker">
							<input type="text" name="fecha-arriendo" placeHolder='10/05/2019' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<strong>Fecha devolución</strong>
						<label class="tmDatepicker">
							<input type="text" name="fecha_devolucion" placeHolder='20/05/2019' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<div class="clear"></div>
						<div class="clear"></div>
						<a href="javascript:;" onclick="parentNode.submit();" class="btn" data-type="submit">Buscar</a>
					</form>
				</div>
			</div>
		</div>
@endsection
