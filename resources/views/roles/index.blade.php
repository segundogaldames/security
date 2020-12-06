@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }} <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm">Crear Rol</a></div>

                <div class="card-body">

                    @if (isset($roles) && @count($roles))
                        <table class="table table-hover">
                            @foreach ($roles as $role)
                                <tr>
                                    <td><a href="{{ route('roles.show', $role ) }}">{{ $role->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay roles registrados</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
