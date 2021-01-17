@extends('layouts.app')
@section('title','Categorias')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categorías') }}</div>

                <div class="card-body">

                    <table class="table table-hover">
                        <tr>
                            <th>Categoría:</th>
                            <td>{{ $category->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $category->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $category->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('categories.index') }}" class="btn btn-link">Volver</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
