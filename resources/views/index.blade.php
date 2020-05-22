@extends('layouts')

@section('title', 'Laravel - Teste')

@section('content')
	<div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Laravel teste
            </div>

            <div class="links">
                <a href="{{ route('clients') }}">Clientes</a>
                <a href="{{ route('products') }}">Produtos</a>
                <a href="{{ route('sells') }}">Vendas</a>
            </div>
        </div>
    </div>
@endsection