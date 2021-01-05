@extends('layouts.app')

@section('title','Regiones')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Regiones') }} | <a href="{{ route('regions.create') }}" class="btn-light">Crear Región</a></div>

                <div class="card-body">

                    @if (isset($regions) && @count($regions))
                        <table class="table table-hover">
                            @foreach ($regions as $region)
                                <tr>
                                    <td><a href="{{ route('regions.show', $region ) }}">{{ $region->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay regiones registradas</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
