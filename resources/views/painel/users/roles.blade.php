@extends('painel.templates.template')

@section('content')

<!--Filters and actions-->
<div class="actions">
	<div class="container">
		<a class="add" href="forms">
			<i class="fa fa-plus-circle"></i>
		</a>

		<form class="form-search form form-inline">
			<input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
			<input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
		</form>
	</div>
</div><!--Actions-->

<div class="clear"></div>

<div class="container">
	<h1 class="title">
		Roles <-> User: <b>{{ $user->name }}</b>
	</h1>

	<table class="table table-hover">
	  <tr>
	  	<th>Name</th>
	  	<th>Description</th>	   
	  	<th width="150px">Ações</th>
	  </tr>
	  @forelse($roles as $role)	
			<tr>
				<td>{{ $role->name }}</td>
				<td>{{ $role->description }}</td>
				<td>
					<a href="{{ url("painel/roles/$role->id/delete") }}" class="delete">
						<i class="fa fa-trash"></i>
					</a>
				</td>		
			</tr>			
	  @empty
			<tr>
				<td colspan="90">
					<p> Nenhum registro encontrado</p>
				</td>
			</tr>			
	  @endforelse	  
	</table>
</div>
@endsection
