@extends('layouts.app')
@section('title','Bienvenidos')
@section('content')

<div class="container">
    @include('partials._messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                </div>

                <div class="card-body">
                    {{ $prueba }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
