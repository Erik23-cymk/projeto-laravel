@extends('layouts')

@section('title', 'Edição de Clientes')

@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<a href="{{ route('clients') }}" type="submit" class="btn btn-primary">Voltar</a>
			</div>
			<div class="row">

				<form method="POST" action="{{ route('clients_update', $client) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}">
						@error('name')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="document_number">CPF / CNPJ</label>
						<input type="text" class="form-control" id="document_number" name="document_number" value="{{ old('document_number', $client->document_number) }}" >
						@error('document_number')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<button type="submit" class="btn btn-success">Alterar</button>
				</form>
			</div>
		</div>
	</div>

@endsection