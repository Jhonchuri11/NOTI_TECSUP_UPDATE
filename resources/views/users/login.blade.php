@extends('users.base')

@section('contenidos_login')
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img">
							
						</div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Iniciar Sesión</h3>
			      		</div>
								
			      	    </div>
					@if ($errors->any())
					    @foreach ($errors->all() as $error)
						   <div class="alert alert-danger" role="alert">
						       <i class="bi bi-exclamation-diamond"></i>
                               <strong>Error!</strong> {{ $error }}
                           </div>
						@endforeach
					@endif
					<form action="{{ route('inicia_sesion') }}" method="POST" class="signin-form">
						@csrf
						<div class="form-group mt-3">
			      			<input type="text" class="form-control" id="codigo_usuario" name="codigo_usuario" value="{{ old('codigo_usuario') }}" required>
			      			<label class="form-control-placeholder" for="username">Código usuario</label>
			      		</div>
						<div class="form-group">
		                    <input id="password-field" type="password" class="form-control" itemid="contrasena" name="password" required>
		                    <label class="form-control-placeholder" for="password">Contraseña</label>
		                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		                </div>
		                    <div class="form-group">
		            	     <button type="submit" class="form-control bg-info    rounded submit px-3">Iniciar sesión</button>
		                </div>
		            </form>
				  <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	
						</div>
						<div class="w-50 text-md-right">
							<a href="#">¿Contraseña?</a>
						</div>
		            </div>
		            <p class="text-center">¿Nuevo usuario? 
					<a class="text-info" href="{{ route('registro') }}">Crear cuenta</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
@endsection