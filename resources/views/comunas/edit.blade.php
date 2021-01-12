@extends('layouts.app')
@section('title','Comunas')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Comuna') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comunas.update', $comuna) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="comuna" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $comuna->nombre }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Región') }}</label>

                            <div class="col-md-6">
                                <select id="region" class="form-control @error('region') is-invalid @enderror" name="region" required autocomplete="region" autofocus>
                                   <option value="{{ $comuna->region_id }}">{{ $comuna->region->nombre }}</option>
                                   @foreach ($regions as $region)
                                       <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                   @endforeach
                                </select>

                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                <a href="{{ route('comunas.show', $comuna) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection