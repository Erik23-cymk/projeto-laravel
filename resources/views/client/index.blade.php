@extends('layouts')

@section('title', 'Clientes')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<a href="/" type="button" class="btn btn-success"><i class="fa fa-left-arrow"></i> Voltar</a>
					<a href="{{ route('clients_create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Cliente</a>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nome</th>
								<th scope="col">CPF / CNPJ</th>
								<th scope="col">Data criação</th>
								<th scope="col"> - </th>
							</tr>
						</thead>
						<tbody>
							@foreach($clients as $client)
							<tr>
								<td>{{ $client->id }}</td>
								<td>{{ $client->name }}</td>
								<td>{{ $client->document_number }}</td>
								<td>{{ $client->created_at->format('d/m/Y') }}</td>
								<td>
									<a href="{{ route('clients_edit', ['client' => $client]) }}" class="btn btn-success float-left"><i class="fa fa-edit"></i></a>

									<form method="POST" action="{{ route('clients_destroy', ['client' => $client]) }}" class="float-left">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
									</form>
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