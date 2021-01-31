@extends('layouts.app')
@section('title','Productos')
@section('content')
<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $product->nombre }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>Producto:</th>
                                    <td>{{ $product->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Precio:</th>
                                    <td>${{ number_format($product->precio,0,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th>Categoría:</th>
                                    <td>{{ $product->category->nombre }}</td>
                                </tr>
                            </table>
                            @guest
                                <p class="text-info">Para comprar debes <a href="{{ route('register') }}">Registrarte</a> o <a href="{{ route('login') }}">Iniciar Sesión</a></p>
                            @else
                                <form method="POST" action="{{ route('shoppingCarts.addShopping', $product) }}">
                                    @csrf
                                    
                                    <input type="number" name="cantidad" placeholder="Cantidad">

                                    @error('cantidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary btn-sm">Comprar</button>
                                </form>
                            @endguest
                            
                        </div> 
                        <div class="col-md-6">
                            @foreach ($images as $image)
                                <img src="{{ asset('img_products/' . $image->imagen) }}">
                            @endforeach
                        </div>    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
