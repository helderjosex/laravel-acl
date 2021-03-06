@extends('auth.templates.template')

@section('content')

<div class="col-md-12">
@if (session('status'))
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif
</div>

<form class="login form" method="POST" action="{{ route('password.email') }}">
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email" class="col-md-4 control-label">E-Mail</label>

		<div class="col-md-6">
			<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-login">
				Enviar Link Recuperação de Senha
			</button>
		</div>
	</div>
</form>
@endsection
