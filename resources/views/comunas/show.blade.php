@extends('layouts.app')
@section('title','Comunas')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Comunas') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Comuna:</th>
                            <td>{{ $comuna->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Región:</th>
                            <td>{{ $comuna->region->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $comuna->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $comuna->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('comunas.edit', $comuna) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('regions.show', $comuna->region_id) }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
