@extends('layouts.app')
@section('title','Bienvenidos')
@section('content')

<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav justify-content-center">
                        @foreach ($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ $category->nombre }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="row card-body">
                    @foreach ($images as $image)
                        <div class="col-md-3 text-center">
                            <a href="{{ route('products.getProduct', $image->product_id) }}">
                            <h4>{{ $image->product->nombre }}</h4>
                            <img src="{{ asset('img_products/' . $image->imagen) }}" style="width: 100%">
                            <p class="text-info precio">${{ number_format($image->product->precio,0,',','.')}}</p></a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
