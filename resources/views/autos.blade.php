@extends('layouts.main')

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
		<a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Arriendo de autos
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
				<a class="dropdown-item" href="/logout">Cerrar sesión</a>
			</div>
		</li>
	@else
		<li class="nav-item">
			<a class="nav-link" href="/login">Iniciar sesión</a>
		</li>
	@endif
@endsection

@section('content')
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->

    <section class="probootstrap_section" id="section-city-guides">
			<div class="container">
        <div class="row align-items-center">
					<div class="col-md">
						<h2 class="display-4 border-bottom probootstrap-section-heading" style="text-align: center;">Encuentra el alquiler perfecto junto a PLACES</h2>
            <p class="lead mb-5 probootstrap-animate">
            </p>
            </p>
          </div>
          <div class="col-md probootstrap-animate">
            <form action="{{ url('vehicle_list') }}" class="probootstrap-form">
              <div class="form-group">
                <div class="row mb-3">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="id_label_single">Lugar de retiro</label>

                      <label for="id_label_single" style="width: 100%;">
                        <select name="ciudad" class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
													<option></option>
													@foreach ($ciudades as $data)
                          <option>{{$data->ciudad}}</option>
                          @endforeach
                        </select>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- END row -->
                <div class="row mb-5">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="probootstrap-date-departure">Fecha de retiro</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input name="fecha_retiro" type="text" id="probootstrap-date-departure" class="form-control" placeHolder={{ date('d/m/Y') }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="probootstrap-date-arrival">Fecha de devolución</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input name="fecha_devolucion" type="text" id="probootstrap-date-arrival" class="form-control" placeHolder={{ "Check-out" }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <!-- END row -->
                <div class="row">
									<div class="col-md">
										</div>
									<div class="col-md">
                    <input type="submit" value="Buscar" class="btn btn-primary btn-block">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
