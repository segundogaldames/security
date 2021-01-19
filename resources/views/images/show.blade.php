@extends('layouts.app')
@section('title','Imagenes')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Imágenes') }}</div>

                <div class="card-body">
                    <img src="{{ asset('img_products/' . $image->imagen) }}">
                    <table class="table table-hover">
                        <tr>
                            <th>Título:</th>
                            <td>{{ $image->titulo }}</td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td>{{ $image->descripcion }}</td>
                        </tr>
                        <tr>
                            <th>Producto:</th>
                            <td>{{ $image->product->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Categoría:</th>
                            <td>{{ $image->product->category->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                @if ($image->active==1)
                                    Activa
                                @else
                                    Inactiva
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Principal:</th>
                            <td>
                                @if ($image->principal==1)
                                    Si
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $image->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $image->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('images.edit', $image) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('products.show', $image->product_id) }}" class="btn btn-link">Volver</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
