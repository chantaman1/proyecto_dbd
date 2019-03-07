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
	<li class="nav-item active dropdown dmenu">
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
    <br>
    <div class="content">
      <div class="row">
        <div class="grid_6" style="margin-left:10%">
          <h3 style="text-align:center"><b>Resumen de pago</b></h3>
          <br>
            <div>
              <a class="btn display" style="color: #000000; width: 100%">
                 <strong>Tipo seguro:</strong> {{ $seguro->tipo }} <br/> <strong>Nombre Pasajero:</strong> {{$pasajero->nombre}} <br/> <strong>Apellido Pasajero:</strong> {{$pasajero->apellido_paterno}} <br> <strong>Fecha de nacimiento:</strong> {{$pasajero->fecha_nacimiento}} <br/> <strong>Correo:</strong> {{$pasajero->correo}} <br/> <strong>Pasaporte:</strong> {{$pasajero->pasaporte}} <br/></a>
            </div>
            <div class="grid_4">
    					<a class="btn" style="color: #000000; text-align: center">
                 <strong>Total a pagar:</strong> {{$seguro->precio}} </a>
    				</div>
        </div>
    		<div class="grid_6" style="margin-left:25%">
    			<h3><b>Datos tarjeta de credito</b></h3>
          <div class="col-md probootstrap-animate">
              <form action="{{ url('finalizar_pago_seguro') }}" class="probootstrap-form">
                <div class="form-group">
                  <div class="row mb-3">
                    <div class="col-md">
                      <div class="form-group">
                        <label for="id_label_single">Nombre Tarjeta</label>

                        <label for="id_label_single" style="width: 100%;">
                          <input name="nombre" type="text" class="form-control" required autofocus>
                        </label>
                      </div>
                    </div>
                  </div>

                  <!-- END row -->

                   <div class="row mb-3">
                    <div class="col-md">
                      <div class="form-group">
                        <label for="id_label_single">Numero Tarjeta</label>

                        <label for="id_label_single" style="width: 100%;">
                          <input name="numero" type="text" class="form-control" required autofocus>
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- END row -->
                  <div class="row mb-5">
                    <div class="col-md">
                      <div class="form-group">
                        <label for="id_label_single">Mes</label>
                        <select class="js-example-basic-single" name="mes" style="width: 100%;">
                          <option selected>01</option>
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
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <label for="id_label_single">Año</label>
                        <select class="js-example-basic-single" name="año" style="width: 100%;">
                          <option selected>2019</option>
                          <option>2020</option>
                          <option>2021</option>
                          <option>2022</option>
                          <option>2023</option>
                          <option>2024</option>
                          <option>2025</option>
                          <option>2026</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- END row -->

                  <div class="row mb-3">
                    <div class="col-md">
                      <div class="form-group">
                        <label for="id_label_single">CVV</label>

                        <label for="id_label_single" style="width: 100%;">
                          <input name="cvv" type="text" class="form-control" required autofocus>
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- END row -->
                  <div class="row">
                    <div class="col-md">
                      </div>
                    <div class="col-md">
                      <input type="submit" value="Realizar pago" class="btn btn-primary btn-block" href="javascript:" onclick="parentNode.submit();">
                    </div>
                  </div>
                </div>
              </form>
            </div>
    		</div>
      </div>
    </div>
@endsection
