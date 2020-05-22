@extends('layouts')

@section('title', 'Nova Venda')

@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<a href="{{ route('sells') }}" type="submit" class="btn btn-primary">Voltar</a>
			</div>
			<div class="row">

				<form method="POST" action="{{ route('sells_store') }}">
					@csrf
					<div class="form-group">
						<label for="client_id">Cliente</label>

						<select class="form-control" id="cliente" name="client_id">
							@foreach($clients as $client)
								<option value="{{ $client->id }}">{{ $client->name }}</option>
							@endforeach
						</select>

						@error('client')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<button type="submit" class="btn btn-success">Adicionar venda</button>
				</form>
			</div>
		</div>
	</div>

@endsection