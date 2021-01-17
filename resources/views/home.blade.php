@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header">{{ __('Comunas') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Comunas
                        </a>
                        <a href="{{ route('regions.index') }}" class="list-group-item list-group-item-action">Regiones</a>
                    </div>
                </div>

                <div class="card-header">{{ __('Productos') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                            Categorías
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Imágenes</a>
                         <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Productos</a>
                    </div>
                </div>

                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action" aria-current="true">
                            Usuarios
                        </a>
                        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">Roles</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
