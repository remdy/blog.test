@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-center">Наши продукты</h1>
                    @foreach($products as $product)
                        <article class="post">
                            <div class="post-thumb">
                                <div class="text-center">
                                    <h3>{{ $product->title }}</h3>
                                </div>
                                <a href="{{ route('product.show', $product->slug) }}"><img src="{{ $product->getImage() }}" alt=""></a>
                            </div>
                        </article>
                    @endforeach
                    {{ $products->links() }}
                    <div class="box-footer">
                        <a href="/" class="btn btn-primary">Назад</a>
                    </div>
                </div>
                @include('pages._sidebar')
                @include('partials.footslider')
            </div>
        </div>
    </div>
    @endsection