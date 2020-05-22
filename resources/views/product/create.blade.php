@extends('layouts')

@section('title', 'Novo Produto')

@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<a href="{{ route('products') }}" type="submit" class="btn btn-primary">Voltar</a>
			</div>
			<div class="row">

				<form method="POST" action="{{ route('products_store') }}">
					@csrf
					<div class="form-group">
						<label for="description">Descrição</label>
						<input type="text" class="form-control" id="name" name="description" value="{{ old('description') }}">
						@error('description')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="amount">Valor</label>
						<input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" >
						@error('amount')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="quantity">Quantidade em estoque</label>
						<input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" >
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