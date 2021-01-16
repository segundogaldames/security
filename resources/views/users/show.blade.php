@extends('layouts.app')
@section('title','Usuarios')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nombre:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Rol:</th>
                            <td>{{ $user->role->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                @if ($user->active==1)
                                    Activo
                                @else
                                    Inactivo
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td>
                                @if (!$user->person)
                                    No registrado
                                @else
                                    {{ $user->person->telefono }}
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td>
                                @if (!$user->person)
                                    No registrada
                                @else
                                    {{ $user->person->direccion }}
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <th>Comuna:</th>
                            <td>
                                @if (!$user->person)
                                    No registrada
                                @else
                                    {{ $user->person->comuna->nombre }}
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th>Modificado:</th>
                            <td>{{ $user->updated_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    </table>
                    <p>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-link">Editar</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-link">Roles</a>
                        <a href="{{ route('users.index') }}" class="btn btn-link">Usuarios</a>
                        @if (!$user->person)
                            <a href="{{ route('people.addPerson', $user) }}" class="btn btn-primary btn-sm">Agregar Datos Personales</a>
                        @else
                            <a href="{{ route('people.edit', $user->person->id) }}" class="btn btn-primary btn-sm">Modificar Datos Personales</a>
                            <form method="POST" action="{{ route('people.destroy', $user->person) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-warning">Eliminar</button>
                            </form>
                        @endif

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
