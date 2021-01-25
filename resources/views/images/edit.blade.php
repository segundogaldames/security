@extends('layouts.app')
@section('title','Imagenes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Imagen de') }} {{ $image->product->nombre }}</div>

                <div class="card-body">
                    <img src="{{ asset('img_products/' . $image->imagen) }}">
                    <form method="POST" action="{{ route('images.update', $image) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ $image->titulo }}" required autocomplete="titulo" autofocus>

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
                                    {{ $image->descripcion }}
                                </textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select id="active" class="form-control @error('active') is-invalid @enderror" name="active" required autocomplete="active" autofocus>
                                    <option value="{{ $image->active }}">@if ($image->active==1)Activo @else Inactivo @endif</option>
                                    <option value="">Seleccione...</option>
                                    <option value="1">Activar</option>
                                    <option value="2">Desactivar</option>
                                </select>

                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Producto') }}</label>

                            <div class="col-md-6">
                                <select id="product" class="form-control @error('product') is-invalid @enderror" name="product" required autocomplete="product" autofocus>
                                    <option value="{{ $image->product_id }}">{{ $image->product->nombre }}</option>
                                    <option value="">Seleccione...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                                    @endforeach
                                </select>

                                @error('product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" autocomplete="imagen" autofocus value="{{ $image->imagen }}">    

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