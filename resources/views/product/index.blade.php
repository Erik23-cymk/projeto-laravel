@extends('layouts')

@section('title', 'Produtos')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<a href="/" type="button" class="btn btn-success"><i class="fa fa-left-arrow"></i> Voltar</a>
					<a href="{{ route('products_create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Novo Produto</a>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Descrição</th>
								<th scope="col">Valor</th>
								<th scope="col">Quantidade em Estoque</th>
								<th scope="col">Data criação</th>
								<th scope="col"> - </th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<td>{{ $product->id }}</td>
								<td>{{ $product->description }}</td>
								<td>{{ $product->amount }}</td>
								<td>{{ $product->quantity }}</td>
								<td>{{ $product->created_at->format('d/m/Y') }}</td>
								<td>
									<a href="{{ route('products_edit', ['product' => $product]) }}" class="btn btn-success float-left"><i class="fa fa-edit"></i></a>

									<form method="POST" action="{{ route('products_destroy', ['product' => $product]) }}" class="float-left">
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