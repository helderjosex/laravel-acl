@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{ $userName }}</h1>
	@forelse($roles as $role)		
		<h3>{{ $role->name }}</h3>
		@foreach($role->permissions as $permission)
		 {{ $permission->name  }}, 
		@endforeach	
		<hr>		
	@empty
	<p> Nenhuma perfil cadastrado!</p>
	@endforelse
</div>
@endsection
