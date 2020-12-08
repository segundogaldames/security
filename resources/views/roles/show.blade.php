@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Rol:</th>
                            <td>{{ $role->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $role->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $role->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-link">Volver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
