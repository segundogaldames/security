@extends('layouts.app')
@section('title','Regiones')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Regiones') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Región:</th>
                            <td>{{ $region->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $region->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $region->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('regions.edit', $region) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('regions.index') }}" class="btn btn-link">Volver</a>
                        <a href="#" class="btn btn-primary btn-sm">Agregar Comuna</a>
                    </p>
                </div>
            </div>
            <!--lista de usuarios por roles-->
            <div class="card">
                <div class="card-header">{{ __('Comunas de la Región ') }} {{ $region->nombre }}</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
