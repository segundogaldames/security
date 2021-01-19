@extends('layouts.app')
@section('title','Productos')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Productos') }}</div>

                <div class="card-body">

                    <table class="table table-hover">
                        <tr>
                            <th>SKU:</th>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $product->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Precio:</th>
                            <td>{{ $product->precio }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $product->descripcion }}</td>
                        </tr>
                        <tr>
                            <th>Categoría:</th>
                            <td>{{ $product->category->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $product->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $product->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('products.index') }}" class="btn btn-link">Volver</a>
                        <a href="{{ route('images.addImage', $product) }}" class="btn btn-primary btn-sm">Agregar Imagen</a>
                    </p>

                </div>
            </div>
            <!--Lista de imagenes por producto-->
            <div class="card">
                <div class="card-header">{{ __('Imágenes de ') }} {{ $product->nombre }}</div>

                <div class="card-body">
                    @if (isset($product->images) && @count($product->images))
                        @foreach ($product->images as $image)
                            <a href="{{ route('images.show', $image) }}"><img src="{{ asset('img_products/' . $image->imagen) }}"></a>
                        @endforeach

                    @else
                        <p class="text-info">No hay imágenes asociadas</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
