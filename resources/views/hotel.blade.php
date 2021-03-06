@extends('layouts.main')

@section('selected')
	<li class="nav-item">
		<a class="nav-link" href="/vuelos">Vuelos <span class="sr-only">(current)</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link active" href="/hoteles">Hoteles</a>
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
						<h2 class="display-4 border-bottom probootstrap-section-heading" style="text-align: center;">RESERVA TU HOTEL</h2>
            <p class="lead mb-5 probootstrap-animate">
            </p>
            </p>
          </div>

          <div class="col-md probootstrap-animate">
            <form action="{{ url('getHotels') }}" class="probootstrap-form">
              <div class="form-group">
                <div class="row mb-3">
                  <div class="col-md">
                    <div class="form-group">
											<label for="id_label_single">Ciudad</label>

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
                      <label for="probootstrap-date-departure">Fecha de check-in</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input type="text" name="fecha_inicio" id="probootstrap-date-departure" class="form-control" placeHolder={{ date('d/m/Y') }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="probootstrap-date-arrival">Fecha de check-out</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input type="text" name="fecha_fin" id="probootstrap-date-arrival" class="form-control" placeHolder={{ "Check-out" }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                </div>
								<!-- END row -->
								<div class="row mb-5">
                  <div class="col-md">
                    <div class="form-group">
											<label for="id_label_single">Adultos</label>
											<select class="js-example-basic-single" name="adults" style="width: 100%;">
												<option selected>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
											</select>
                    </div>
                  </div>
									<div class="col-md">
                    <div class="form-group">
											<label for="id_label_single2">Niños</label>
											<select class="js-example-basic-single" name="children" style="width: 100%;">
												<option selected>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
											</select>
                    </div>
                  </div>
                </div>

                <!-- END row -->
                <div class="row">
									<div class="col-md">
										</div>
									<div class="col-md">
                    <input type="submit" value="Busca tu hotel" class="btn btn-primary btn-block" href="javascript:" onclick="parentNode.submit();">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection
