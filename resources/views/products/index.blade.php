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
                            {{ __('Productos') }} | <a href="{{ route('products.create') }}" class="btn-light">Crear Producto</a>
                        </div>
                        <div class="col-md-6">
                            <form class="text-md-right">
                                <input type="search" name="buscar" class="formBuscar" placeholder="Ingrese SKU del producto">
                                <button type="submit" class="btn btn-success btn-sm">Buscar</button>
                            </form>
                        </div>
                    </div>
                    
                    
                </div>

                <div class="card-body">

                    @if (isset($products) && @count($products))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>SKU</th>
                                <th>Categoría</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('products.show', $product ) }}">{{ $product->nombre }}</a></td>
                                    <td>{{ $product->sku }}</td>
                                    <td><a href="{{ route('categories.show', $product->category_id) }}">{{ $product->category->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay productos registrados</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
