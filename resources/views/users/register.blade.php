@extends('users.base')
@section('contenidos_login')
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Registrarse</h3>
			      		</div>	
			      	</div>
					<form action="{{ route('validar_registro') }}" method="POST" class="signin-form">
						@csrf
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" id="codigo_usuario" name="codigo_usuario" value="{{ old('codigo_usuario') }}" required>
			      			<label class="form-control-placeholder" for="username">Código usuario</label>
							  @error('codigo_usuario')
							     <small style="color:red">{{ $message }}</small>
							@enderror
			      		</div>
		                <div class="form-group">
		                    <input id="password-field" type="password"  class="form-control" itemid="contrasena" name="password" value="{{ old('password') }}" required>
		                    <label class="form-control-placeholder" for="password">Contraseña</label>
		                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							@error('password')
							    <small style="color: red;">{{ $message }}</small>
							@enderror
		                </div>
		                <div class="form-group">
		                	<button type="submit" class="form-control bg-info rounded  submit px-3">Registrar</button>
		               </div> 
		            </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
@endsection