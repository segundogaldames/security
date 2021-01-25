@extends('layouts.app')
@section('title','Imagenes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nueva Relevancia de ') }} {{ $image->titulo }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('images.modifyPrincipal', $image) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="principal" class="col-md-4 col-form-label text-md-right">{{ __('Relevancia') }}</label>

                            <div class="col-md-6">
                                <select id="principal" class="form-control @error('principal') is-invalid @enderror" name="principal" required autocomplete="principal" autofocus>
                                    <option value="{{ $image->principal }}">@if ($image->principal==1)Principal @else Secundaria @endif</option>
                                    <option value="">Seleccione...</option>
                                    <option value="1">Principal</option>
                                    <option value="2">Secundaria</option>
                                </select>

                                @error('principal')
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
                                <a href="{{ route('images.show', $image) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection