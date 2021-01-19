@extends('layouts.app')
@section('title','Imagenes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nueva Imagen de') }} {{ $product->nombre }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('images.setImage', $product) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción (opcional)') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" autocomplete="descripcion" autofocus style="resize: none;" rows="4">
                                    {{ old('descripcion') }}
                                </textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" required autocomplete="imagen" autofocus>    

                                @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-link">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection