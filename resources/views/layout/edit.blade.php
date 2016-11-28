@extends('master')

@section('content')

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Cadastro de pets</div>
  <div class="panel-body">
    {{ Form::open(['method' => 'put', 'action' => ['PetController@update', $pet->id]]) }}
  	  	<div class="form-group">
    		<label for="name">Nome</label>
    		<input type="text" value="{{ $pet->name }}" class="form-control" name="name" placeholder="Nome do pet">
  		</div>
  		<div class="row">
  			<div class="col-md-6">
  				<div class="form-group">
  					<label for="born">Data de nascimento</label>
  					<input type="text" value="{{ $pet->born }}" class="form-control" name="born" placeholder="10\08\2016">
  				</div>
  			</div>
  			 <div class="col-md-6">
  				<div class="form-group">
  					<label for="gender">Sexo</label>
  					<select class="form-control" name="gender">
              <option></option>
  						<option value="macho">Macho</option>
  						<option value="femea">Femea</option>
  					</select>
  				</div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-md-6">
  				<div class="form-group">
  					<label for="owner">Proprietário(a)</label>
  					<input type="text" value="{{ $pet->owner }}" class="form-control" name="owner" placeholder="Proprietário(a)">
  				</div>
  			</div>
  			 <div class="col-md-6">
  				<div class="form-group">
  					<label for="phone">Telefone</label>
  					<input type="text" value="{{ $pet->phone }}" class="form-control" name="phone" placeholder="Telefone.">
  				</div>
  			</div>
  		</div>
  <button type="submit" class="btn btn-primary">Concluir</button>
  {{ Form::close() }}
  </div>
</div>

@endsection