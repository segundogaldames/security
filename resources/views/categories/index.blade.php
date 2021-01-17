@extends('layouts.app')
@section('title','Categorias')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categorías') }} | <a href="{{ route('categories.create') }}" class="btn-light">Crear Categoría</a></div>

                <div class="card-body">

                    @if (isset($categories) && @count($categories))
                        <table class="table table-hover">
                            @foreach ($categories as $category)
                                <tr>
                                    <td><a href="{{ route('categories.show', $category ) }}">{{ $category->nombre }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="text-info">No hay categorías registradas</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
