@extends('layouts.main')

@section('selected')
	<li class="nav-item"><a class="nav-link" href="/vuelos1">Vuelos</a></li>
	<li class="nav-item"><a class="nav-link" href="/hoteles1">Hoteles</a></li>
	<li class="nav-item"><a class="nav-link" href="/paquetes1">Paquetes</a></li>
	<li class="nav-item"><a class="nav-link" href="/autos1">Autos</a></li>
	<li class="nav-item active"><a class="nav-link" href="/login1">Iniciar Sesión</a></li>
@endsection

@section('content')
		<section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_1.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>
			<div class="container">
	    <div class="row">
				<div class="col-md-6">
		        <div class="card card-signin my-5">
		          <div class="card-body">
		            <h5 class="card-title text-center">Ingresa a tu cuenta</h5>
		            <form class="form-signin" method="POST" action="{{ url('login/doLogin') }}">
		              <div class="form-label-group">
		                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		                <label for="inputEmail">Correo electrónico</label>
		              </div>
		              <div class="form-label-group">
		                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
		                <label for="inputPassword">Contraseña</label>
		              </div>
		              <div class="custom-control custom-checkbox mb-3">
		                <input type="checkbox" class="custom-control-input" id="customCheck1">
		                <label class="custom-control-label" for="customCheck1">¿Olvidaste tu usuario o clave?</label>
		              </div>
		              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Ingresar</button>
		              <hr class="my-4">
									<a class="btn btn-lg btn-facebook btn-block text-uppercase" href="{{url('/auth/facebook')}}">Conectarse con Facebook</a>
		            </form>
		          </div>
		        </div>
				</div>
				<div class="col-md-6">
					<div class="card card-signin my-5">
						<div class="card-body">
							<h5 class="card-title text-center">¿No tienes una cuenta? ¡Regístrate gratis!</h5>
							<form class="form-signin">
								<div class="form-label-group">
									<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
									<label for="inputEmail">Correo electrónico</label>
								</div>
								<div class="form-label-group">
									<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
									<label for="inputPassword">Contraseña</label>
								</div>
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
								<hr class="my-4">
							</form>
						</div>
					</div>
				</div>
	    </div>
	  </div>

    </section>
    <!-- END section -->

		<section>

	</section>


    <!-- END section -->
@endsection
