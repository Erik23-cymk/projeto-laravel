@extends('layouts')

@section('title', 'Produtos')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<a href="/" type="button" class="btn btn-success"><i class="fa fa-left-arrow"></i> Voltar</a>
					<a href="{{ route('sells_create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nova Venda</a>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Cliente</th>
								<th scope="col">Valor</th>
								<th scope="col">Data de finalização</th>
								<th scope="col"> - </th>
							</tr>
						</thead>
						<tbody>
							@foreach($sell as $sell)
							<tr>
								<td>{{ $sell->id }}</td>
								<td>{{ $sell->client->name }}
								<td>{{ $sell->amount }}</td>
								<td>{{ $sell->finish_date != null ? $sell->finish_date->format('d/m/Y') : "em processo" }}</td>
								<td>
									<a href="{{ route('sell_products', ['sell' => $sell]) }}" class="btn btn-primary float-left"><i class="fa fa-plus"></i></a>

									<a href="{{ route('sells_edit', ['sell' => $sell]) }}" class="btn btn-warning float-left"><i class="fa fa-edit"></i></a>

									@if($sell->finish_date == null)
										<form method="POST" action="{{ route('sells_finish', ['sell' => $sell]) }}" class="float-left">
											@csrf
											@method('PUT')
											<button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i></button>
										</form>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection