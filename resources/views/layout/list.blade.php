@extends('master')

@section('content')

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de pets</div>
  <!-- Table -->
  <table class="table table-striped">
    <thead>
    	<tr>
    		<th>Nome</th>
    		<th>Idade</th>
    		<th>Sexo</th>
    		<th>Proprietário(a)</th>
    		<th>Telefone</th>
    		<th>Ações</th>
    	</tr>
    </thead>
    <tbody>
    @foreach($pets as $pet)
    	<tr>
    		<td>{{ $pet->name }}</td>
    		<td>{{ $pet->born }}</td>
    		<td>{{ $pet->gender }}</td>
    		<td>{{ $pet->owner }}</td>
    		<td>{{ $pet->phone }}</td>
    		<td>
    		<a class="btn btn-primary" href="{{ route('pets.edit', $pet->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>
    		{{ Form::open(['method' => 'delete', 'route' => ['pets.destroy', $pet->id]]) }}
    			<button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-remove"></i></button>
    		{{ Form::close() }}
    		</td>
    	</tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection