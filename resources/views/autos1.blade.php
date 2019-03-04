@extends('layouts.main')

@section('selected')
	<li class="nav-item"><a class="nav-link" href="/vuelos1">Vuelos</a></li>
	<li class="nav-item"><a class="nav-link" href="/hoteles1">Hoteles</a></li>
	<li class="nav-item"><a class="nav-link" href="/paquetes1">Paquetes</a></li>
	<li class="nav-item active"><a class="nav-link" href="/autos1">Autos</a></li>
	<li class="nav-item"><a class="nav-link" href="/login1">Iniciar Sesión</a></li>
@endsection

@section('content')
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>

    </section>
    <!-- END section -->

    <section class="probootstrap_section" id="section-city-guides">
			<div class="container">
        <div class="row align-items-center">

          <div class="col-md probootstrap-animate">
            <form action="#" class="probootstrap-form">
              <div class="form-group">
                <div class="row mb-3">
                  <div class="col-md">
                    <div class="form-group">
                      <label for="id_label_single">Lugar de retiro</label>

                      <label for="id_label_single" style="width: 100%;">
                        <select class="js-example-basic-single js-states form-control" id="id_label_single" style="width: 100%;">
													<option></option>
                          <option value="Cancún">Cancún</option>
                          <option value="Punta Cana">Punta Cana</option>
                          <option value="Playa del Carmen">Playa del Carmen</option>
                          <option value="Camboriú">Camboriú</option>
                          <option value="Río de Janeiro">Río de Janeiro</option>
                          <option value="Búzios">Búzios</option>
                          <option value="Buenos Aires">Buenos Aires</option>
                          <option value="Bariloche">Bariloche</option>
													<option value="Mendoza">Mendoza</option>
													<option value="Nueva York">Nueva York</option>
													<option value="Los Ángeles">Los Ángeles</option>
													<option value="Miami">Miami</option>
													<option value="Santiago">Santiago</option>
													<option value="Puerto Varas">Puerto Varas</option>
                          <option value="Pucón">Pucón</option>
                          <option value="Puerto Natales">Puerto Natales</option>
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
                        <input type="text" id="probootstrap-date-departure" class="form-control" placeHolder={{ date('d/m/Y') }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label for="probootstrap-date-arrival">Fecha de devolución</label>
                      <div class="probootstrap-date-wrap">
                        <span class="icon ion-calendar"></span>
                        <input type="text" id="probootstrap-date-arrival" class="form-control" placeHolder={{ "Check-out" }} data-constraints="@NotEmpty @Required @Date">
                      </div>
                    </div>
                  </div>
                </div>

								<div class="row mb-5">
                  <div class="col-md">
                    <div class="form-group">
											<select class="js-example-basic-single" style="width: 100%;">
												<option>1 adulto</option>
												<option selected>2 adultos</option>
												<option>3 adultos</option>
											</select>
                    </div>
                  </div>
									<div class="col-md">
                    <div class="form-group">
											<select class="js-example-basic-single" style="width: 100%;">
												<option>Sin niños</option>
												<option>1 niño</option>
												<option>2 niños</option>
											</select>
                    </div>
                  </div>
                </div>

                <!-- END row -->
                <div class="row">
									<div class="col-md">
										</div>
									<div class="col-md">
                    <input type="submit" value="Busca tu hotel" class="btn btn-primary btn-block">
                  </div>
                </div>
              </div>
            </form>
          </div>

					<div class="col-md">
            <h2 class="heading mb-2 display-4 font-light probootstrap-animate">RESERVA TU AUTO	</h2>
            <p class="lead mb-5 probootstrap-animate">


            </p>
            </p>
          </div>

        </div>
      </div>
    </section>
@endsection
