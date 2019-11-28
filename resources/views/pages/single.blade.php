@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>{{ $product->title }}</h1>
                        <div>{!! $product->video !!}</div>
                    <h3>{!! $product->description !!}</h3>
                    <div class="box-footer">
                        <a href="/product" class="btn btn-primary">Вернуться к продуктам</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection