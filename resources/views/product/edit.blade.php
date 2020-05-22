@extends('layouts')

@section('title', 'Edição de Clientes')

@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<a href="{{ route('clients') }}" type="submit" class="btn btn-primary">Voltar</a>
			</div>
			<div class="row">

				<form method="POST" action="{{ route('products_update', $product) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="description">Descrição</label>
						<input type="text" class="form-control" id="name" name="description" value="{{ old('description', $product->description) }}">
						@error('description')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="amount">Valor</label>
						<input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', $product->amount) }}" >
						@error('amount')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="quantity">Quantidade em estoque</label>
						<input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" >
						@error('quantity')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<button type="submit" class="btn btn-success">Enviar</button>
				</form>
			</div>
		</div>
	</div>

@endsection