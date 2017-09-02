@extends('auth.templates.template')

@section('content')
<form class="login form" method="POST" action="{{ route('login') }}">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email" class="col-md-4 control-label">E-Mail</label>

		<div class="col-md-6">
			<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		<label for="password" class="col-md-4 control-label">Senha</label>

		<div class="col-md-6">
			<input id="password" type="password" class="form-control" name="password" required>

			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-8 col-md-offset-4">
			<button type="submit" class="btn btn-login">
				Entrar
			</button>
		</div>
	</div>
	<div class="form-group text-right">
		<div class="col-md-8 col-md-offset-4">
			<a href="{{ route('password.request') }}" class="recuperar">
				Recuperar Senha?
			</a>
		</div>
	</div>
</form>
@endsection
