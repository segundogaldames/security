@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }} | <a href="{{ route('users.create') }}" class="btn-light">Crear Usuario</a></div>

                <div class="card-body">

                    @if (isset($users) && @count($users))
                        <table class="table table-hover">
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Activo</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td><a href="{{ route('users.show', $user ) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->nombre }}</td>
                                    <td>
                                        @if ($user->active==1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay usuarios registrados</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
