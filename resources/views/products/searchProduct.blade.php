@extends('layouts.app')
@section('title','Productos')
@section('content')

<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('products.index') }}" class="btn-light">Productos</a>
                        </div>
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('products.searchProduct') }}" class="text-md-right">
                                @csrf

                                <input type="search" name="sku" class="formBuscar" placeholder="Ingrese SKU del producto">
                                <button type="submit" class="btn btn-success btn-sm">Buscar</button>
                            </form>
                        </div>
                    </div>


                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>SKU</th>
                                <th>Categoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ route('products.show', $product ) }}">{{ $product->nombre }}</a></td>
                                <td>{{ $product->sku }}</td>
                                <td><a href="{{ route('categories.show', $product->category_id) }}">{{ $product->category->nombre }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
