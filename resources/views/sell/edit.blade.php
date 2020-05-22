@extends('layouts')

@section('title', 'Alterar Venda')

@section('content')

	<div class="container">
		<div class="col-12">
			<div class="row">
				<a href="{{ route('sells') }}" type="submit" class="btn btn-primary">Voltar</a>
			</div>
			<div class="row">

				<form method="POST" action="{{ route('sells_update', $sell) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="client_id">Cliente</label>

						@if($sell->finish_date == null)
							<select class="form-control" id="cliente" name="client_id">
								@foreach($clients as $client)
									<option value="{{ $client->id }}" {{ $client->id == $sell->client->id ? "selected" : "" }}>{{ $client->name }}</option>
								@endforeach
							</select>
						@else
							<input type="text" class="form-control" value="{{ $sell->client->name }}" readonly="readonly">
						@endif

						@error('client')
						    <div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					
					<button type="submit" class="btn btn-success">Alterar venda</button>
				</form>
			</div>
		</div>
	</div>

@endsection