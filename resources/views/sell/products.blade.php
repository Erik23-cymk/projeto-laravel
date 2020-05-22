@extends('layouts')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<a href="{{ route('sells') }}" type="button" class="btn btn-primary">Voltar</a>
				</div>
				<div class="row">
					<form method="POST" action="{{ route('sells_product_store', $sell) }}">
						@csrf
						<div class="form-group">
							<label for="product_id">Produto</label>

							<select class="form-control" id="product_id" name="product_id">
								@foreach($products as $product)
									<option value="{{ $product->id }}">{{ $product->description }}</option>
								@endforeach
							</select>

							@error('product_id')
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
						
						<button type="submit" class="btn btn-success">Adicionar produto</button>
					</form>
				</div>
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>Produto</th>
								<th>Quantidade</th>
								<th>Valor</th>
								<th> - </th>
							</tr>
						</thead>
						<tbody>
							@foreach($sell->products as $products)
								<tr>
									<td>{{ $products->product->description }}</td>
									<td>{{ $products->quantity }}</td>
									<td>{{ $products->amount }}</td>
									<td>
										<form method="POST" action="{{ route('sells_product_destroy', ['sell' => $sell, 'productItem' => $products]) }}" class="float-left">
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